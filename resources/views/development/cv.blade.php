@extends('layouts.development')

@section('css')
@endsection

@section('content')

    <!-- Three -->
    <section id="main" class="wrapper style1">
        <header class="major">
            <h2>{{ __('development_menu.cv') }}</h2>
            {{--<p>Tempus adipiscing commodo ut aliquam blandit</p>--}}
        </header>

        <div class="container">
            <div class="row">
                <div class="8u">
                    <section id="cv-top-info">
                        <div class="avatar">
                            <div class="inner">
                                <img src="{{ url('img/avatar.jpeg') }}" alt="avatar">
                            </div>
                        </div>
                        <div class="name">
                            <div class="first">{{ __('Alexey') }}</div>
                            <div class="last">{{ __('Zagarov') }}</div>
                            <div class="occupation">{{ __('Software Developer') }}</div>
                        </div>
                        <div class="clear"></div>
                    </section>
                </div>
                <div class="4u">
                    <section id="cv-top-contacts">
                        <div class="phone">
                            <i class="fa fa-phone"></i>
                            +7 (913) 632 35-53
                        </div>
                        <div class="email">
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:azagarov@gmail.com">azagarov@gmail.com</a>
                        </div>
                        <div class="website">
                            <i class="fa fa-globe"></i>
                            <a href="http://webdiver.herokuapp.com/development">webdiver.herokuapp.com</a>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="4u who-i-am">
                    <h2>Who I Am</h2>
                    <h4>Life Philosophy</h4>
                    <div class="life-philosophy">
                        <div class="left-quote"><i class="fa fa-quote-left"></i></div>
                        <p>
                            Fear is the path to the dark side. Fear leads to anger. Anger leads to hate. Hate leads to suffering.
                        </p>
                        <div class="right-quote"><i class="fa fa-quote-right"></i></div>
                        <div class="author">Master Yoda</div>
                    </div>
                    <h4>About me</h4>
                    <div class="about-me">
                        <p>
                            I'm a more than 15 years experience Software Architect/Developer, and my experience allows
                            me to be more than just a programmer. After years I became an expert in some business problems,
                            that clients what to solve hiring a developer.
                        </p>
                        <p>
                            While the big part of my job is still programming,
                            when hired, my primary goal is to give client the best possible solution, suggest options
                            he might not have considered and, if applicable, describe real experience (good or bad) I
                            had with the similar features.
                        </p>
                        <p>
                            I keep myself plugged-in expert and always open for new
                            technologies and trends.
                        </p>
                    </div>

                    <h4>My Numbers</h4>
                    <div class="my-numbers">
                        <div class="item">
                            <div class="number">15+</div>
                            <div class="item-label">Years Experience</div>
                        </div>
                        <div class="item">
                            <div class="number">50+</div>
                            <div class="item-label">Finished Projects</div>
                        </div>
                        <div class="item">
                            <div class="number">16</div>
                            <div class="item-label">Countries<br />I worked from</div>
                        </div>
                        <div class="item">
                            <div class="number">0</div>
                            <div class="item-label"><br />Hours of Regret</div>
                        </div>
                        <div class="item">
                            <div class="number">40+</div>
                            <div class="item-label">IT Books Read</div>
                        </div>
                        <div class="item">
                            <div class="number">5</div>
                            <div class="item-label">Laptops Changed</div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <h4>My Interests</h4>
                    <div class="my-interests">
                        <div class="item">
                            <div class="icon"><img src="/img/icons/diving.svg" style="width: 50px;height: auto;margin-top: -7px;"/></div>
                            <div class="item-label">Diving</div>
                        </div>
                        <div class="item">
                            <div class="icon"><img src="/img/icons/guitar.svg" style="width: 50px;height: auto;margin-top: -7px;"/></div>
                            <div class="item-label">Guitar</div>
                        </div>
                        <div class="item">
                            <div class="icon"><img src="/img/icons/moto.svg" style="width: 50px;height: auto;margin-top: -7px;"/></div>
                            <div class="item-label">Moto</div>
                        </div>
                        <div class="item">
                            <div class="icon"><img src="/img/icons/coffe.svg" style="width: 50px;height: auto;margin-top: -7px;"/></div>
                            <div class="item-label">Double Espresso</div>
                        </div>
                        <div class="item">
                            <div class="icon"><img src="/img/icons/languages.svg" style="width: 50px;height: auto;margin-top: -7px;"/></div>
                            <div class="item-label">Languages</div>
                        </div>
                        <div class="item">
                            <div class="icon"><img src="/img/icons/anchor.svg" style="width: 50px;height: auto;margin-top: -7px;"/></div>
                            <div class="item-label">Sailing</div>
                        </div>
                    </div>
                </div>
                <div class="4u my-experience">
                    <h2>My Experiences</h2>
                    <h4>Work Experiences</h4>
                    <div id="work_experience">
                        <div class="experience">
                            <h6>Software Architect / Developer</h6>
                            <div class="icon"><i class="fa fa-briefcase"></i></div>
                            <div class="name">Freelance</div>
                            <div class="grade">Development / Architecture</div>
                            <div class="period">May 2008 - Present</div>
                            <div class="location">Whole World</div>
                            <div class="l-icon"><i class="fa fa-map-marker"></i></div>
                            <div class="clear"></div>
                        </div>
                        <div class="experience">
                            <h6>Head of Web Department</h6>
                            <div class="icon"><i class="fa fa-briefcase"></i></div>
                            <div class="name">ISS Art Ltd.</div>
                            <div class="grade">Management / Architecture</div>
                            <div class="period">Dec 2006 - May 2008</div>
                            <div class="location">Omsk, Russia</div>
                            <div class="l-icon"><i class="fa fa-map-marker"></i></div>
                            <div class="clear"></div>
                        </div>
                        <div class="experience">
                            <h6>Web Developer</h6>
                            <div class="icon"><i class="fa fa-briefcase"></i></div>
                            <div class="name">Freelance</div>
                            <div class="grade">Development</div>
                            <div class="period">April 2004 - Dec 2006</div>
                            <div class="location">Omsk, Russia</div>
                            <div class="l-icon"><i class="fa fa-map-marker"></i></div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <h4>Education</h4>
                    <div id="education">
                        <div class="experience">
                            <h6>University</h6>
                            <div class="icon"><i class="fa fa-graduation-cap"></i></div>
                            <div class="name">Omsk State Technical University</div>
                            <div class="grade">Master of Technics and Technology</div>
                            <div class="period">1999-2006</div>
                            <div class="location">Omsk, Russia</div>
                            <div class="l-icon"><i class="fa fa-map-marker"></i></div>
                            <div class="clear"></div>
                        </div>
                        <div class="experience">
                            <h6>School</h6>
                            <div class="icon"><i class="fa fa-graduation-cap"></i></div>
                            <div class="name">School #1 of Tavricheskoe</div>
                            <div class="grade">Deep Math Study</div>
                            <div class="period">1988-1999</div>
                            <div class="location">Tavricheskoe, Russia</div>
                            <div class="l-icon"><i class="fa fa-map-marker"></i></div>
                            <div class="clear"></div>
                        </div>
                        <div class="experience">
                            <h6>Never-Ending Education</h6>
                            <div class="icon"><i class="fa fa-graduation-cap"></i></div>
                            <div class="name">World &amp; Life</div>
                            <div class="grade">Eternal Student</div>
                            <div class="period">1982-Present</div>
                            <div class="location">Earth</div>
                            <div class="l-icon"><i class="fa fa-map-marker"></i></div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <h4>I Speak</h4>
                    <div id="spoken-languages">
                        <div class="experience">
                            <h6>Russian</h6>
                            <div class="icon"><i class="fa fa-language"></i></div>
                            <div class="name">Native</div>
                            <div class="grade">I was born in Russia</div>
                            {{--<div class="period">1999-2006</div>--}}
                            {{--<div class="location">Omsk, Russia</div>--}}
                            {{--<div class="l-icon"><i class="fa fa-map-marker"></i></div>--}}
                            <div class="clear"></div>
                        </div>
                        <div class="experience">
                            <h6>English</h6>
                            <div class="icon"><i class="fa fa-language"></i></div>
                            <div class="name">Advanced</div>
                            <div class="grade">GoEnglish, Izhevsk, Russia</div>
                            {{--<div class="period">1988-1999</div>--}}
                            {{--<div class="location">Tavricheskoe, Russia</div>--}}
                            {{--<div class="l-icon"><i class="fa fa-map-marker"></i></div>--}}
                            <div class="clear"></div>
                        </div>
                        <div class="experience">
                            <h6>Spanish</h6>
                            <div class="icon"><i class="fa fa-language"></i></div>
                            <div class="name">Intermediate</div>
                            <div class="grade">DELE B1, Sevilla, Spain</div>
                            {{--<div class="period">1982-Present</div>--}}
                            {{--<div class="location">Earth</div>--}}
                            {{--<div class="l-icon"><i class="fa fa-map-marker"></i></div>--}}
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="4u my-skills">
                    <h2>My Skills</h2>

                    <h4>My Strengths</h4>
                    <div class="strength">
                        <i class="fa fa-check"></i>
                        Software Design
                    </div>
                    <div class="strength">
                        <i class="fa fa-check"></i>
                        Computer Security
                    </div>
                    <div class="strength">
                        <i class="fa fa-check"></i>
                        Changes foresight(*)
                    </div>
                    <div class="strength">
                        <i class="fa fa-check"></i>
                        OOP, OOD
                    </div>
                    <br />
                    *based on significant experience
                    <h4>Technical Skills</h4>

                    @php
                        $_skills = [
                            'Programming' => [
                                ['PHP', 100, 'gold'],
                                ['JavaScript', 100, 'green'],
                                ['C++', 80, 'blue'],
                                ['Swift', 60, 'yellow'],
                                ['Objective C', 25, 'brown'],
                                ['Java', 20, 'red'],
                            ],
                            'Databases' => [
                                ['MySQL', 100, 'gold'],
                                ['SQLite', 75, 'brown'],
                                ['Postgres', 60, 'green'],
                                ['MongoDB', 60, 'blue'],
                                ['ElasticSearch', 50, 'yellow'],
                                //['Objective C', 25, 'brown'],
                                //['Java', 20, 'red'],
                            ],

                            'Web Frontend' => [
                                ['HTML', 95, 'gold'],
                                ['Bootstrap', 85, 'orange'],
                                ['CSS', 70, 'red'],
                                ['jQuery', 100, 'blue'],
                                ['Vue.js', 85, 'green'],
                                ['React.js', 75, 'yellow'],
                                ['Angular.js', 65, 'brown'],
                            ],

                            'Frameworks & Platforms' => [
                                ['Laravel (PHP)', 100, 'gold'],
                                ['WordPress (PHP)', 90, 'green'],
                                ['Cocoa / CocoaTouch (Swift)', 60, 'blue'],
                                ['Joomla (PHP)', 50, 'yellow'],
                                ['Magenta (PHP)', 50, 'brown'],
                                //['Java', 20, 'red'],
                            ],
                        ];
                    @endphp
                    <div class="skills-list">
                @foreach($_skills as $cat => $l)
                        <h5>{{ $cat }}</h5>
                    @foreach($l as $_s)

                        <div class="skill">
                            <h6>{{ $_s[0] }}</h6>
                            <div class="meter">
                                <div class="level" style="width:{{ $_s[1] }}%;background-color:{{ $_s[2] }};"></div>
                            </div>
                        </div>
                    @endforeach

                    @foreach($l as $_s)
                        @break;
                        <div class="skill2">
                            <div class="meter">
                                <div class="level" style="width:{{ $_s[1] }}%;background-color:{{ $_s[2] }};">{{ $_s[0] }}</div>
                            </div>
                        </div>
                    @endforeach

                        @endforeach
                    </div>

                    <h4>Other</h4>
                    <p>
                        AJAX, RESTful, OAuth, 2-ways Authentication, Git, SVN, FB Apps, 3rd Party systems integration, Complex Reporting systems, I will never disappear
                    </p>

                    <br />
                    <a href="http://www.zend.com/en/yellow-pages/ZEND008250" target="_blank">
                        <img src="https://www.zend.com/static-assets/img/zcedirectory/ZCE-PHP5-logo-XS.jpg" />
                    </a>

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