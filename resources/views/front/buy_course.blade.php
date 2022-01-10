@extends('front.master')

@section('title', 'Homepage | '. env('APP_NAME'))

@section('style')

<style>

#payment-form {
  max-width: 31.5rem;
  margin: 0 auto;
}

iframe {
  width: 100%;
}

.one-liner {
  display: flex;
  flex-direction: column;
}

#pay-button {
  border: none;
  border-radius: 3px;
  color: #fff;
  font-weight: 500;
  height: 40px;
  width: 100%;
  background-color: #13395e;
  box-shadow: 0 1px 3px 0 rgba(19, 57, 94, 0.4);
}

#pay-button:active {
  background-color: #0b2a49;
  box-shadow: 0 1px 3px 0 rgba(19, 57, 94, 0.4);
}

#pay-button:hover {
  background-color: #15406b;
  box-shadow: 0 2px 5px 0 rgba(19, 57, 94, 0.4);
}

#pay-button:disabled {
  background-color: #697887;
  box-shadow: none;
}

#pay-button:not(:disabled) {
  cursor: pointer;
}

.card-frame {
  border: solid 1px #13395e;
  border-radius: 3px;
  width: 100%;
  margin-bottom: 8px;
  height: 40px;
  box-shadow: 0 1px 3px 0 rgba(19, 57, 94, 0.2);
}

.card-frame.frame--rendered {
  opacity: 1; /* Prevents iFrame rendering issue */

  /* Reminder: consider removal of 'rendered' */
  /* event passing to Merchant page */
}

.card-frame.frame--rendered.frame--focus {
  border: solid 1px #13395e;
  box-shadow: 0 2px 5px 0 rgba(19, 57, 94, 0.15);
}

.card-frame.frame--rendered.frame--invalid {
  border: solid 1px #d96830;
  box-shadow: 0 2px 5px 0 rgba(217, 104, 48, 0.15);
}

.error-message {
  color: #c9501c;
  font-size: 0.9rem;
  margin: 8px 0 0 1px;
  font-weight: 300;
}

.success-payment-message {
  color: #13395e;
  line-height: 1.4;
}
.token {
  color: #b35e14;
  font-size: 0.9rem;
  font-family: monospace;
}

@media screen and (min-width: 31rem) {
  .one-liner {
    flex-direction: row;
  }

  .card-frame {
    width: 318px;
    margin-bottom: 0;
  }

  #pay-button {
    width: 175px;
    margin-left: 8px;
  }
}

</style>

@stop

@section('content')

<section class="page-header">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="page-header-content">
              <h1>Checkout</h1>
              <ul class="list-inline mb-0">
                <li class="list-inline-item">
                  <a href="#">Home</a>
                </li>
                <li class="list-inline-item">/</li>
                <li class="list-inline-item">
                    Checkout
                </li>
              </ul>
            </div>
        </div>
      </div>
    </div>
</section>


<main class="site-main woocommerce single single-product page-wrapper">
    <!--shop category start-->
    <section class="space-3">
        <div class="container">
            <div class="row">
                <div class="col-md-7">

                    {{-- <script src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId={{ $checkoutId }}"></script>
                    <form action="{{ route('website.buy_course_thanks', $course->id) }}" class="paymentWidgets" data-brands="VISA MASTER AMEX MADA"></form> --}}

                    <form
                    id="payment-form"
                    method="POST"
                    action="https://merchant.com/charge-card"
                    >
                    <div class="one-liner">
                        <div class="card-frame"></div>
                        <button id="pay-button" disabled>
                        PAY GBP 24.99
                        </button>
                    </div>
                    <p class="error-message"></p>
                    <p class="success-payment-message"></p>
                    </form>

                </div>
                <div class="col-md-5">
                    <div id="order_review" class="woocommerce-checkout-review-order w-100">
                        <h3 id="order_review_heading">Your order</h3>
                        <table class="shop_table woocommerce-checkout-review-order-table">
                            <thead>
                            <tr>
                                <th class="product-name">Product</th>
                                <th class="product-total">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="cart_item">
                                <td class="product-name">
                                    Beanie with Logo&nbsp;
                                    <strong class="product-quantity">× 2</strong>													</td>
                                <td class="product-total">
                                    <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">৳&nbsp;</span>36.00</span>						</td>
                            </tr>

                            </tbody>
                            <tfoot>


                            <tr class="order-total">
                                <th>Total</th>
                                <td><strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">৳&nbsp;</span>54.00</span></strong> </td>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--shop category end-->
</main>
@stop

@section('script')
<script src="https://cdn.checkout.com/js/framesv2.min.js"></script>
<script>
    /* global Frames */
var payButton = document.getElementById("pay-button");
var form = document.getElementById("payment-form");
var errorStack = [];

Frames.init("pk_test_8ac41c0d-fbcc-4ae3-a771-31ea533a2beb");

Frames.addEventHandler(
  Frames.Events.CARD_VALIDATION_CHANGED,
  onCardValidationChanged
);
function onCardValidationChanged(event) {
  console.log("CARD_VALIDATION_CHANGED: %o", event);
  payButton.disabled = !Frames.isCardValid();
}

Frames.addEventHandler(
  Frames.Events.FRAME_VALIDATION_CHANGED,
  onValidationChanged
);
function onValidationChanged(event) {
  console.log("FRAME_VALIDATION_CHANGED: %o", event);

  var errorMessageElement = document.querySelector(".error-message");
  var hasError = !event.isValid && !event.isEmpty;

  if (hasError) {
    errorStack.push(event.element);
  } else {
    errorStack = errorStack.filter(function (element) {
      return element !== event.element;
    });
  }

  var errorMessage = errorStack.length
    ? getErrorMessage(errorStack[errorStack.length - 1])
    : "";
  errorMessageElement.textContent = errorMessage;
}

function getErrorMessage(element) {
  var errors = {
    "card-number": "Please enter a valid card number",
    "expiry-date": "Please enter a valid expiry date",
    cvv: "Please enter a valid cvv code",
  };

  return errors[element];
}

Frames.addEventHandler(
  Frames.Events.CARD_TOKENIZATION_FAILED,
  onCardTokenizationFailed
);
function onCardTokenizationFailed(error) {
  console.log("CARD_TOKENIZATION_FAILED: %o", error);
  Frames.enableSubmitForm();
}

Frames.addEventHandler(Frames.Events.CARD_TOKENIZED, onCardTokenized);
function onCardTokenized(event) {
  var el = document.querySelector(".success-payment-message");
  el.innerHTML =
    "Card tokenization completed<br>" +
    'Your card token is: <span class="token">' +
    event.token +
    "</span>";
}

form.addEventListener("submit", function (event) {
  event.preventDefault();
  Frames.submitCard();
});

</script>
@stop
