@extends('front.master')

@section('title', 'Homepage | '. env('APP_NAME'))

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

                    <script src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId={{ $checkoutId }}"></script>
                    <form action="{shopperResultUrl}" class="paymentWidgets" data-brands="VISA MASTER AMEX MADA"></form>


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
