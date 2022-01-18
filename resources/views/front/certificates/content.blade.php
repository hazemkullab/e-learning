<style>
    @page {
        margin-top: 340px;
        background: url("{{ asset('certificate.png') }}");
        background-image-resize: 6;
        /* background-image-resolution: from-image; */
    }

    body {
        font-family: 'lato', sans-serif, serif;
    }

    .barcode {
        padding: 2.5mm;
        margin: 0;
        vertical-align: top;
        color: #000;
    }

    .barcodecell {
        float: right;
        text-align: center;
        vertical-align: middle;
    }

    .page-break {
    page-break-after: always;
}

</style>

<div class="certificate-content" style="margin: 0 auto;">
    <div style="text-align: center;">
        <h3 style="font-style: italic;font-weight: bold;font-size: 30px;color: #5b5b5b;">
            {{ $user->name }}</h3>
        <p style="margin-bottom: 5px;margin-top: 25px;font-size: 16px;font-weight: 300;color: #707070;">has successfully completed {{ $course->videos->count() }} contact videos in
        </p>
        <h5 style="font-size: 20px;color: #5b5b5b;margin: 0;padding: 5px 70px 0 70px;">
            {{ $course->trans_name }}
        </h5>


            <p style="margin:0;margin-bottom: 15px;margin-top: 10px;font-size: 16px;font-weight: 300;color: #707070;">
                {{ $course->created_at->format('d/m/Y') }}
            </p>


        <p style="margin:0;margin-bottom: 15px;margin-top: 20px;font-size: 16px;font-weight: 300;color: #707070;">
            Gaza - Palestine
        </p>

        <div class="row" style="margin-top: 20px;">
            <br><br><br><br>
            <table width="80%" align="center" cellpadding="0">
                <tr>
                    <td width="15%" align="left">
                        <div class="barcodecell">
                            <barcode code="{!! $data_for_qr !!}" type="QR" class="barcode" size="0.9" error="L"
                                disableborder="I" />
                        </div>
                    </td>
                    <td width="65%" align="center">
                        <img src="{{ $course->image }}"
                                    style="width: 100px;display: block;margin: 0 auto;margin-top: 5px;">
                    </td>
                    <td width="15%"></td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="page-break"></div>

<div class="certificate-content" style="margin: 0 auto;">
    <div style="text-align: center;">
        <h3 style="font-style: italic;font-weight: bold;font-size: 30px;color: #5b5b5b;">
            {{ $user->name }}</h3>
        <p style="margin-bottom: 5px;margin-top: 25px;font-size: 16px;font-weight: 300;color: #707070;">has successfully completed {{ $course->videos->count() }} contact videos in
        </p>
        <h5 style="font-size: 20px;color: #5b5b5b;margin: 0;padding: 5px 70px 0 70px;">
            {{ $course->trans_name }}
        </h5>


            <p style="margin:0;margin-bottom: 15px;margin-top: 10px;font-size: 16px;font-weight: 300;color: #707070;">
                {{ $course->created_at->format('d/m/Y') }}
            </p>


        <p style="margin:0;margin-bottom: 15px;margin-top: 20px;font-size: 16px;font-weight: 300;color: #707070;">
            Gaza - Palestine
        </p>

        <div class="row" style="margin-top: 20px;">
            <br><br><br><br>
            <table width="80%" align="center" cellpadding="0">
                <tr>
                    <td width="15%" align="left">
                        <div class="barcodecell">
                            <barcode code="{!! $data_for_qr !!}" type="QR" class="barcode" size="0.9" error="L"
                                disableborder="I" />
                        </div>
                    </td>
                    <td width="65%" align="center">
                        <img src="{{ $course->image }}"
                                    style="width: 100px;display: block;margin: 0 auto;margin-top: 5px;">
                    </td>
                    <td width="15%"></td>
                </tr>
            </table>
        </div>
    </div>
</div>
