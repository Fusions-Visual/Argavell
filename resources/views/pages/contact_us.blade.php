@extends('layouts.app')

@section('content')
    {{-- desktop header --}}
    <div class="row w-100 m-0 align-items-center d-none d-sm-flex"">
        <div class="col-md-2"></div>
        <div class="col-md-5 pe-5">
            <img src="{{ asset('images/argan-fruit.png') }}" width="150px">
            <h1 class="text-argavell font-elmessiri font-weight-bold">Contact Us</h1>
            <div class="pe-4">Don’t hesitate to contact us and we are always ready to serve your needs!
            </div>
        </div>
        <div class="col-md-5 p-0">
            <img src="{{ asset('images/faq.jpg') }}" class="w-100">
        </div>
    </div>
    {{-- mobile header --}}
    <div class="row w-100 m-0 align-items-center pt-5 d-block d-sm-none text-center">
        <div class="col-12 p-0 py-4">
            <img src="{{ asset('images/faq.jpg') }}" class="w-100">
        </div>
        <div class="col-md-5">
            <img src="{{ asset('images/argan-fruit.png') }}" width="100px">
            <h1 class="text-argavell font-elmessiri font-weight-bold text-4xl">Contact Us</h1>
            <div class="px-2 text-start">Don’t hesitate to contact us and we are always ready to serve your needs!</div>
        </div>
    </div>
    <div
        class="row justify-content-center argan-benefits"
        style="padding-top: 8rem; padding-bottom: 8rem;">
        <div class="col-xs-6 col-md-2 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48.003" viewBox="0 0 48 48.003">
                <g id="jcIdXC.tif" transform="translate(-2951.716 -3778.086)">
                    <g id="Group_14221" data-name="Group 14221" transform="translate(2951.716 3778.086)">
                        <path id="Path_7864" data-name="Path 7864"
                            d="M2951.716,3802.071a24,24,0,1,1,23.972,24.019A24.009,24.009,0,0,1,2951.716,3802.071Zm23.991,13.87c2.288-.086,4.59-.073,6.872-.286a7.015,7.015,0,0,0,6.025-4.157,8.481,8.481,0,0,0,.79-3.54q.075-4.873.079-9.747c0-.982-.07-1.968-.167-2.946a7.239,7.239,0,0,0-6.788-6.757c-2.035-.169-4.087-.192-6.131-.187-2.513.006-5.035,0-7.536.2a6.951,6.951,0,0,0-6.026,4.148,8.512,8.512,0,0,0-.788,3.541q-.074,4.849-.08,9.7c0,1,.071,2,.167,2.992a7.243,7.243,0,0,0,6.74,6.756C2971.134,3815.854,2973.419,3815.854,2975.707,3815.941Z"
                            transform="translate(-2951.716 -3778.086)" fill="#8a5b32" />
                        <path id="Path_7865" data-name="Path 7865"
                            d="M3082.643,3921.577c.061-2.12.068-4.215.195-6.3a4.79,4.79,0,0,1,4.876-4.869q6.247-.167,12.5,0a4.721,4.721,0,0,1,4.907,4.919c.113,4.181.1,8.369-.009,12.551a4.517,4.517,0,0,1-3.238,4.475,8.687,8.687,0,0,1-2.574.411c-3.545.045-7.091.05-10.635,0a8.7,8.7,0,0,1-2.749-.476,4.6,4.6,0,0,1-3.072-4.408C3082.707,3925.77,3082.7,3923.658,3082.643,3921.577Zm18.414-.053a7.07,7.07,0,1,0-7.078,7.085A7.057,7.057,0,0,0,3101.057,3921.524Zm.279-5.7a1.645,1.645,0,1,0-1.636-1.628A1.637,1.637,0,0,0,3101.336,3915.827Z"
                            transform="translate(-3069.987 -3897.538)" fill="#8a5b32" />
                        <path id="Path_7866" data-name="Path 7866"
                            d="M3161.67,3983.452a4.593,4.593,0,1,1-4.589-4.585A4.6,4.6,0,0,1,3161.67,3983.452Z"
                            transform="translate(-3133.077 -3959.458)" fill="#8a5b32" />
                    </g>
                </g>
            </svg>
            <h3 class="text-argavell font-elmessiri font-weight-bold my-2">Instagram</h3>
            <h5>@argavell.id</h5>
        </div>
        <div class="col-xs-6 col-md-2 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="47.999" height="48.003" viewBox="0 0 47.999 48.003">
                <g id="Group_14229" data-name="Group 14229" transform="translate(-5079.716 -3778.086)">
                    <path id="Path_7874" data-name="Path 7874"
                        d="M5079.716,3802.071a24,24,0,1,1,23.972,24.018A24.008,24.008,0,0,1,5079.716,3802.071Z"
                        fill="#8a5b32" />
                    <g id="_3h2ln5.tif" data-name="3h2ln5.tif" transform="translate(5091.93 3788.791)">
                        <g id="Group_14229-2" data-name="Group 14229" transform="translate(0 0)">
                            <path id="Path_7875" data-name="Path 7875"
                                d="M5206.074,3915.429v-21.75h5.864c1.243-3.359,3.161-4.884,5.991-4.841,2.806.043,4.729,1.632,5.766,4.835h5.892c.022.421.054.75.055,1.078q.005,6.412,0,12.825a7.766,7.766,0,0,1-7.88,7.853C5216.573,3915.43,5211.384,3915.429,5206.074,3915.429Zm.948-1.013a2.607,2.607,0,0,0,.379.071c4.784.006,9.568.072,14.351-.006,4.156-.067,6.927-3,6.947-7.178.019-3.868,0-7.735,0-11.6,0-.326-.038-.652-.063-1.051-3.562.022-7.064-.247-10.4,1.164a1.188,1.188,0,0,1-.847-.02c-3.323-1.473-6.822-1.121-10.372-1.139Zm14.858-20.713a4.075,4.075,0,0,0-4.312-3.27c-1.92.131-3.644,1.657-3.747,3.222,1.213.374,2.4.747,3.6,1.1a1.321,1.321,0,0,0,.683.054C5219.363,3894.459,5220.617,3894.076,5221.881,3893.7Z"
                                transform="translate(-5206.074 -3888.836)" fill="#fff" />
                            <path id="Path_7876" data-name="Path 7876"
                                d="M5228.389,3990.073c-.739-.678-1.562-1.479-2.441-2.21a1.359,1.359,0,0,0-1.011-.3c-3.108.731-5.837-.61-6.837-3.414a5.522,5.522,0,0,1,10.022-4.535c.073.113.143.229.216.345a19.528,19.528,0,0,1,1.434-1.683,5.392,5.392,0,0,1,7.007-.355,5.523,5.523,0,0,1,1.7,6.747,5.438,5.438,0,0,1-6.287,2.96,1.419,1.419,0,0,0-1.645.5C5229.845,3988.855,5229.045,3989.488,5228.389,3990.073Zm-7.081-9.022a2.816,2.816,0,0,0,.658,3.574,3,3,0,0,0,3.587.186,3.1,3.1,0,0,0,1.1-3.342,2.673,2.673,0,0,0-2.775-1.9c.223.788.292,1.559-.549,2.038C5222.541,3982.056,5221.912,3981.718,5221.308,3981.051Zm9.035.006a3.04,3.04,0,0,0,.689,3.595,2.96,2.96,0,0,0,4.733-3.084,2.727,2.727,0,0,0-2.851-1.979c.29.8.293,1.551-.54,2.022C5231.587,3982.058,5230.956,3981.7,5230.343,3981.057Zm-1.96,8.358a23.415,23.415,0,0,0,1.677-1.755.906.906,0,0,0-.044-.877c-.983-1.041-2.615-.821-3.646.511Z"
                                transform="translate(-5216.645 -3968.279)" fill="#fff" />
                        </g>
                    </g>
                </g>
            </svg>
            <h3 class="text-argavell font-elmessiri font-weight-bold my-2">Tokopedia</h3>
            <h5>Argavell Indonesia</h5>
        </div>
        <div class="col-xs-6 col-md-2 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48.003" viewBox="0 0 48 48.003">
                <g id="Group_14228" data-name="Group 14228" transform="translate(-4015.716 -3778.086)">
                    <path id="Path_7872" data-name="Path 7872"
                        d="M4015.716,3802.071a24,24,0,1,1,23.972,24.019A24.009,24.009,0,0,1,4015.716,3802.071Z"
                        transform="translate(0)" fill="#8a5b32" />
                    <g id="BQZGdO.tif" transform="translate(4028.552 3789.767)">
                        <g id="Group_14227" data-name="Group 14227" transform="translate(0 0)">
                            <path id="Path_7873" data-name="Path 7873"
                                d="M4154.827,3909.166h-16.4a.309.309,0,0,0-.077-.041,2.226,2.226,0,0,1-1.929-2.218c-.127-2.063-.244-4.127-.365-6.191q-.249-4.281-.5-8.562c-.023-.393-.067-.785-.1-1.176v-.416a.72.72,0,0,1,.755-.441c1.613.013,3.227,0,4.841.01.228,0,.32-.048.355-.3a6.818,6.818,0,0,1,1.439-3.4,4.682,4.682,0,0,1,7.4-.186,6.7,6.7,0,0,1,1.6,3.548c.039.263.117.339.381.337,1.634-.012,3.267-.008,4.9,0,.458,0,.684.235.658.678q-.149,2.565-.3,5.129-.226,3.839-.455,7.678c-.073,1.206-.114,2.415-.239,3.615a2.08,2.08,0,0,1-1.563,1.826C4155.093,3909.1,4154.959,3909.129,4154.827,3909.166Zm-8.552-3.384a4.779,4.779,0,0,0,3.416-1.133,3.113,3.113,0,0,0-.083-4.651,7.617,7.617,0,0,0-2.284-1.234,22.125,22.125,0,0,1-2.148-.921,1.282,1.282,0,0,1-.015-2.3,2.682,2.682,0,0,1,1.351-.395,4.6,4.6,0,0,1,2.635.771c.329.208.423.186.622-.133q.2-.327.4-.658c.181-.3.174-.421-.129-.578a11.072,11.072,0,0,0-1.714-.8,4.654,4.654,0,0,0-4.1.443,2.914,2.914,0,0,0-.013,5,4.794,4.794,0,0,0,.647.36c.674.283,1.364.527,2.031.826a8.17,8.17,0,0,1,1.563.829,1.441,1.441,0,0,1-.058,2.381,3.041,3.041,0,0,1-2.375.5,5.23,5.23,0,0,1-2.414-1.142c-.24-.19-.357-.175-.534.077s-.355.524-.532.787a.293.293,0,0,0,.057.443A6.487,6.487,0,0,0,4146.275,3905.782Zm3.906-15.668a4.851,4.851,0,0,0-1.7-3.231,2.884,2.884,0,0,0-3.764.048,4.68,4.68,0,0,0-1.531,2.519c-.056.213-.089.432-.136.664Z"
                                transform="translate(-4135.456 -3884.524)" fill="#fff" />
                        </g>
                    </g>
                </g>
            </svg>
            <h3 class="text-argavell font-elmessiri font-weight-bold my-2">Shopee</h3>
            <h5>Argavell Official Shop</h5>
        </div>
        <div class="col-xs-6 col-md-2 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48.003" viewBox="0 0 48 48.003">
                <g id="Group_14223" data-name="Group 14223" transform="translate(-3483.716 -3778.086)">
                    <path id="Path_7867" data-name="Path 7867"
                        d="M3483.716,3802.071a24,24,0,1,1,23.972,24.018A24.01,24.01,0,0,1,3483.716,3802.071Z"
                        transform="translate(0)" fill="#8a5b32" />
                    <g id="Group_14222" data-name="Group 14222" transform="translate(3493.894 3788.201)">
                        <path id="Path_7868" data-name="Path 7868"
                            d="M3589.007,3910.507c.626-2.294,1.237-4.5,1.821-6.712a1.128,1.128,0,0,0-.077-.749,13.782,13.782,0,1,1,15.03,6.925,13.313,13.313,0,0,1-8.962-1.113,1.4,1.4,0,0,0-1.064-.113c-2.08.562-4.167,1.1-6.251,1.643C3589.364,3910.425,3589.221,3910.456,3589.007,3910.507Zm3.3-3.253c1.368-.357,2.643-.68,3.91-1.028a.937.937,0,0,1,.8.1,11.229,11.229,0,0,0,7.6,1.5,11.449,11.449,0,1,0-11.439-5.278,1.173,1.173,0,0,1,.145,1.043C3592.972,3904.782,3592.656,3905.978,3592.306,3907.254Z"
                            transform="translate(-3589.007 -3882.735)" fill="#fff" />
                        <path id="Path_7869" data-name="Path 7869"
                            d="M3670.91,3972.043a8.4,8.4,0,0,1-3.424-.975,13.97,13.97,0,0,1-5.382-4.579,8.23,8.23,0,0,1-1.712-3.274,3.876,3.876,0,0,1,1.156-3.771,2.05,2.05,0,0,1,1.86-.3,1.012,1.012,0,0,1,.4.462c.39.89.771,1.786,1.112,2.7a.874.874,0,0,1-.086.663,9.979,9.979,0,0,1-.825,1.118.541.541,0,0,0-.043.7,9.422,9.422,0,0,0,4.713,4.053.582.582,0,0,0,.751-.2c.314-.4.662-.776.954-1.192a.6.6,0,0,1,.85-.235c.919.436,1.843.863,2.745,1.333a.718.718,0,0,1,.282.538c.048,1.716-1.163,2.607-2.716,2.929A4.615,4.615,0,0,1,3670.91,3972.043Z"
                            transform="translate(-3653.403 -3951.655)" fill="#fff" />
                    </g>
                </g>
            </svg>
            <h3 class="text-argavell font-elmessiri font-weight-bold my-2">Whatsapp</h3>
            <h5>0821 4321 1310</h5>
        </div>
        <div class="col-xs-6 col-md-2 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48.003" viewBox="0 0 48 48.003">
                <g id="Group_14226" data-name="Group 14226" transform="translate(-4547.716 -3778.086)">
                    <path id="Path_7870" data-name="Path 7870"
                        d="M4547.716,3802.071a24,24,0,1,1,23.972,24.018A24.009,24.009,0,0,1,4547.716,3802.071Z"
                        fill="#8a5b32" />
                    <g id="Group_14225" data-name="Group 14225" transform="translate(4557.894 3790.811)">
                        <g id="Group_14224" data-name="Group 14224" transform="translate(0 0)">
                            <path id="Path_7871" data-name="Path 7871"
                                d="M4680.534,3920.837a9.527,9.527,0,0,1-2.092,5.822,25.165,25.165,0,0,1-5.415,4.981c-1.572,1.134-3.209,2.177-4.833,3.238-.525.342-1.1.61-1.65.911a.92.92,0,0,1-.158.075c-.3.1-.624.254-.89-.023-.246-.257-.1-.568-.027-.865.174-.7.377-1.4.482-2.118.1-.649-.172-.875-.826-.938a16.082,16.082,0,0,1-5.671-1.6,12.577,12.577,0,0,1-3.951-3,9.728,9.728,0,0,1-2.434-5.371,9.351,9.351,0,0,1,2.334-7.334,13.816,13.816,0,0,1,7.5-4.426,15.712,15.712,0,0,1,5.028-.405,14.444,14.444,0,0,1,10.122,4.739,9.3,9.3,0,0,1,2.438,5.7c.007.117.033.233.041.351S4680.534,3920.782,4680.534,3920.837Zm-13.978-.669c.917,1.244,1.8,2.437,2.678,3.632a.8.8,0,0,0,.878.366.727.727,0,0,0,.5-.768q0-2.63-.008-5.26a.728.728,0,0,0-.714-.8.766.766,0,0,0-.719.8c.028.976.01,1.953.008,2.93,0,.084-.014.168-.026.3-.1-.13-.166-.213-.229-.3q-1.255-1.695-2.509-3.388a.687.687,0,0,0-.83-.294.735.735,0,0,0-.493.771c0,1.754-.011,3.507.011,5.261a1.014,1.014,0,0,0,.283.6.607.607,0,0,0,.749.091.8.8,0,0,0,.421-.822C4666.558,3922.278,4666.556,3921.262,4666.556,3920.168Zm6.461-1.365c.621,0,1.218,0,1.815,0a.792.792,0,0,0,.882-.711.766.766,0,0,0-.862-.762q-1.217-.007-2.435,0a.757.757,0,0,0-.853.84q-.005,2.629,0,5.257a.682.682,0,0,0,.73.757c.895.006,1.79.007,2.684,0a.829.829,0,0,0,.426-.12.652.652,0,0,0,.28-.8.716.716,0,0,0-.728-.506c-.644,0-1.287,0-1.926,0v-1.262c.662,0,1.3.027,1.931-.015a.918.918,0,0,0,.612-.317.69.69,0,0,0-.579-1.1c-.655-.023-1.312-.005-1.979-.005Zm-13.758,3.961c0-1.55-.007-3.043,0-4.536,0-.507-.259-.865-.7-.878a.744.744,0,0,0-.741.81q-.016,2.61-.009,5.219a.744.744,0,0,0,.813.807c.836,0,1.671,0,2.506,0,.518,0,.858-.29.853-.719a.757.757,0,0,0-.841-.7C4660.539,3922.764,4659.93,3922.765,4659.259,3922.765Zm3.374-1.978h-.006c0,.858-.009,1.717.007,2.575a1.046,1.046,0,0,0,.154.522.649.649,0,0,0,.8.265.733.733,0,0,0,.492-.742c0-.694-.017-1.388-.02-2.082,0-1.069,0-2.138-.005-3.207a.675.675,0,0,0-.5-.722c-.512-.151-.921.186-.928.776C4662.625,3919.044,4662.633,3919.916,4662.633,3920.787Z"
                                transform="translate(-4653.007 -3909.727)" fill="#fff" />
                        </g>
                    </g>
                </g>
            </svg>
            <h3 class="text-argavell font-elmessiri font-weight-bold my-2">Line</h3>
            <h5>@argavell.id</h5>
        </div>
    </div>
    <div
        class="row w-100 landing-showcase-background text-center py-5 m-0 position-relative"
        style="height:45vh;">
        <img src="{{ asset('images/landing-argan-oil.jpg') }}" class="d-block w-100 position-absolute top-0 p-0"
            style="height: 100%;object-fit: cover;">
        <div class="position-absolute top-50 start-50 translate-middle" style="z-index: 11;">
            <h1 class="font-elmessiri text-white mt-5">Invest in Your Skin & Hair<br>with Argavell</h1>
            <a href="{{ route('page.ourproduct') }}" class="text-decoration-none d-none d-sm-block">
                <div class="btn-argavell-light text-center w-25 py-2 cursor-pointer mx-auto mb-5 font-weight-bold">Browse Product</div>
            </a>
            <a href="{{ route('page.ourproduct') }}" class="text-decoration-none d-block d-sm-none">
                <div class="btn-argavell-light text-center w-50 py-2 cursor-pointer mx-auto mb-5 font-weight-bold">Browse Product</div>
            </a>
        </div>
    </div>
@endsection
