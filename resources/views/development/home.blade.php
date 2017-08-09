@extends('layouts.development')

@section('content')

    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <h2>{{ __('Development is an Art') }}</h2>
            <p>{{ __('the language doesn\'t matter') }}</p>
            <ul class="actions">
                <li><a href="#content" class="button big special">Sign Up</a></li>
                <li><a href="#elements" class="button big alt">Learn More</a></li>
            </ul>
        </div>
    </section>

    <!-- Three -->
    <section id="three" class="wrapper style1">
        <div class="container">
            <div class="row">
                <div class="8u">
                    <section>
                        <h2>{{ __('My Name is Alexey Zagarov') }}</h2>
                        <a href="#" class="image fit"><img src="/img/az_pic01.jpg" alt="" /></a>
                        <p>{!!  __('development.recent_article') !!}</p>
                    </section>
                </div>
                <div class="4u">
                    <section>
                        <h3>Magna massa blandit</h3>
                        <p>Feugiat amet accumsan ante aliquet feugiat accumsan. Ante blandit accumsan eu amet tortor non lorem felis semper. Interdum adipiscing orci feugiat penatibus adipiscing col cubilia lorem ipsum dolor sit amet feugiat consequat.</p>
                        <ul class="actions">
                            <li><a href="#" class="button alt">Learn More</a></li>
                        </ul>
                    </section>
                    <hr />
                    <section>
                        <h3>Ante sed commodo</h3>
                        <ul class="alt">
                            <li><a href="#">Erat blandit risus vis adipiscing</a></li>
                            <li><a href="#">Tempus ultricies faucibus amet</a></li>
                            <li><a href="#">Arcu commodo non adipiscing quis</a></li>
                            <li><a href="#">Accumsan vis lacinia semper</a></li>
                        </ul>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!-- One -->
    <section id="one" class="wrapper style1">
        <header class="major">
            <h2>Ipsum feugiat consequat</h2>
            <p>Tempus adipiscing commodo ut aliquam blandit</p>
        </header>
        <div class="container">


            <div class="row">
                <div class="4u">
                    <section class="special box">
                        <i class="icon fa-area-chart major"></i>
                        <h3>Justo placerat</h3>
                        <p>Eu non col commodo accumsan ante mi. Commodo consectetur sed mi adipiscing accumsan ac nunc tincidunt lobortis.</p>
                    </section>
                </div>
                <div class="4u">
                    <section class="special box">
                        <i class="icon fa-refresh major"></i>
                        <h3>Blandit quis curae</h3>
                        <p>Eu non col commodo accumsan ante mi. Commodo consectetur sed mi adipiscing accumsan ac nunc tincidunt lobortis.</p>
                    </section>
                </div>
                <div class="4u">
                    <section class="special box">
                        <i class="icon fa-cog major"></i>
                        <h3>Amet sed accumsan</h3>
                        <p>Eu non col commodo accumsan ante mi. Commodo consectetur sed mi adipiscing accumsan ac nunc tincidunt lobortis.</p>
                    </section>
                </div>
            </div>
        </div>
    </section>

    <!-- Two -->
    <section id="two" class="wrapper style2">
        <header class="major">
            <h2>Commodo accumsan aliquam</h2>
            <p>Amet nisi nunc lorem accumsan</p>
        </header>
        <div class="container">
            <div class="row">
                <div class="6u">
                    <section class="special">
                        <a href="#" class="image fit"><img src="/templated-ion/images/pic01.jpg" alt="" /></a>
                        <h3>Mollis adipiscing nisl</h3>
                        <p>Eget mi ac magna cep lobortis faucibus accumsan enim lacinia adipiscing metus urna adipiscing cep commodo id. Ac quis arcu amet. Arcu nascetur lorem adipiscing non faucibus odio nullam arcu lobortis. Aliquet ante feugiat. Turpis aliquet ac posuere volutpat lorem arcu aliquam lorem.</p>
                        <ul class="actions">
                            <li><a href="#" class="button alt">Learn More</a></li>
                        </ul>
                    </section>
                </div>
                <div class="6u">
                    <section class="special">
                        <a href="#" class="image fit"><img src="/templated-ion/images/pic02.jpg" alt="" /></a>
                        <h3>Neque ornare adipiscing</h3>
                        <p>Eget mi ac magna cep lobortis faucibus accumsan enim lacinia adipiscing metus urna adipiscing cep commodo id. Ac quis arcu amet. Arcu nascetur lorem adipiscing non faucibus odio nullam arcu lobortis. Aliquet ante feugiat. Turpis aliquet ac posuere volutpat lorem arcu aliquam lorem.</p>
                        <ul class="actions">
                            <li><a href="#" class="button alt">Learn More</a></li>
                        </ul>
                    </section>
                </div>
            </div>
        </div>
    </section>



@endsection