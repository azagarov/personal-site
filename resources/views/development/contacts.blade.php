@extends('layouts.development')

@section('content')

<style>
    .form-group {
        /*margin-bottom: 1rem;*/
    }
</style>

    <section id="main" class="wrapper style1">
        <header class="major">
            <h2>{!!  __('contacts.contact_me') !!}</h2>
            {{--<p>Tempus adipiscing commodo ut aliquam blandit</p>--}}
        </header>
        <div class="container">
            <section>
                <h2>{!! __('contacts.send_me_a_message') !!}</h2>
                <form name="messageForm" target="#" method="post" action="/contacts/send_message">
                    {{ csrf_field() }}
                <div class="row">
                    <div class="6u">
                        <div class="form-group">
                            <label for="name">{!! __('general_forms.name') !!}: *
                                <input class="form-control" name="name" id="name" type="text" placeholder="{!! __('general_forms.name_placeholder') !!}" required />
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="email">{!! __('general_forms.email') !!}: *
                                <input class="form-control" name="name" id="email" type="email" placeholder="{!! __('general_forms.email_placeholder') !!}" required />
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="phone">{!! __('general_forms.phone') !!}:
                                <input class="form-control" name="phone" id="phone" type="text" placeholder="{!! __('general_forms.phone_placeholder') !!}" />
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="subject">{!! __('general_forms.subject') !!}:
                                <input class="form-control" name="subject" id="subject" type="text" placeholder="{!! __('general_forms.subject_placeholder') !!}" />
                            </label>
                        </div>
                    </div>
                    <div class="6u">
                        <div class="form-group">
                            <label for="message">{!! __('general_forms.message') !!}: *
                                <textarea class="form-control" style="height: 22rem" name="message" id="message" placeholder="{!! __('general_forms.message_placeholder') !!}" required></textarea>
                            </label>
                        </div>

                        <div class="form-group">
                            <button class="button special" id="send_message">{!! __('general_forms.button') !!}</button>
                        </div>
                    </div>
                </div>
                </form>
            </section>
            <hr class="major" />

            <div class="row">
                <div class="6u">
                    <section class="specialz">
                        <h3>{{ __('Contact Me Directly') }}</h3>

                        <ul>
                            <li>E-Mail: <a href="mailto:azagarov@gmail.com<">azagarov@gmail.com</a></li>
                            <li>Phone: +7(913) 632-3553</li>
                            <li>Skype: aleksey_zagarov</li>
                        </ul>
<!--
                        <a href="#" class="image fit"><img src="/templated-ion/images/pic01.jpg" alt="" /></a>
                        <p>Eget mi ac magna cep lobortis faucibus accumsan enim lacinia adipiscing metus urna adipiscing cep commodo id. Ac quis arcu amet. Arcu nascetur lorem adipiscing non faucibus odio nullam arcu lobortis. Aliquet ante feugiat. Turpis aliquet ac posuere volutpat lorem arcu aliquam lorem.</p>
                        <ul class="actions">
                            <li><a href="#" class="button alt">Learn More</a></li>
                        </ul>
-->
                    </section>
                </div>
                <div class="6u">
                    <section class="specialz">

                        <h3>{{ __('Get In Touch With Social') }}</h3>

                        <div class="social">
                            <a href="https://www.facebook.com/aleksey.zagarov" rel="nofollow" target="_blank"><i class="fa fa-facebook-square fa-3x" aria-hidden="true"></i></a>
                            <a href="https://www.linkedin.com/in/aleksey-zagarov-219b0bbb/" rel="nofollow" target="_blank"><i class="fa fa-linkedin-square fa-3x" aria-hidden="true"></i></a>
                            <a href="https://vk.com/azagarov" rel="nofollow" target="_blank"><i class="fa fa-vk fa-3x" aria-hidden="true"></i></a>
                            <!--<a href="https://www.facebook.com/aleksey.zagarov" rel="nofollow" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                            <a target="_blank" href="https://www.linkedin.com/in/aleksey-zagarov-219b0bbb/">https://www.linkedin.com/in/aleksey-zagarov-219b0bbb/</a>
                            <a target="_blank" href="https://vk.com/azagarov">https://vk.com/azagarov</a>-->
                        </div>
<!--
                        <a href="#" class="image fit"><img src="/templated-ion/images/pic02.jpg" alt="" /></a>
                        <h3>Neque ornare adipiscing</h3>
                        <p>Eget mi ac magna cep lobortis faucibus accumsan enim lacinia adipiscing metus urna adipiscing cep commodo id. Ac quis arcu amet. Arcu nascetur lorem adipiscing non faucibus odio nullam arcu lobortis. Aliquet ante feugiat. Turpis aliquet ac posuere volutpat lorem arcu aliquam lorem.</p>
                        <ul class="actions">
                            <li><a href="#" class="button alt">Learn More</a></li>
                        </ul>
-->
                    </section>
                </div>
            </div>

            <hr class="major" />
            <section>
                <h3>{{ __('You may meet me walking around') }}</h3>
                <h2>{{ __('Saint Petersburg') }}, {{ __('Russia') }}</h2>
                <div class="row">
                    <div class="12u">
                        <div class="google_map_container">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d383712.3521052332!2d30.15504800773092!3d59.92313155864009!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sru!4v1564666194892!5m2!1sen!2sru" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>


<script type="text/javascript">
$(document).ready(function() {
    $(document.forms['messageForm']).submit(function(e) {
        e.preventDefault();

        var $_token = "{{ csrf_token() }}";

        $.post(
            "/contacts/send_message",
            {
                _token: $_token,
                source: 'development_contacts',
                name: $('#name').val(),
                email: $('#email').val(),
                phone: $('#phone').val(),
                subject: $('#subject').val(),
                message: $('#message').val()
            },
            function(data) {
                if(data.ok) {
                    alert("The message has been sent. Thank you.");
                    $('#message').val('');
                } else {
                    alert("Something went wrong. Please try again later");
                }
            },
            'json'
        );
    });
//    $('#send_message').click(function(e) {
//        e.preventDefault();
//        alert('X');
//    });
});
</script>



@endsection