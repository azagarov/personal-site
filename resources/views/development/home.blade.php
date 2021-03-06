@extends('layouts.development')

@section('content')

    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <h2>{{ __('Development is an Art') }}</h2>
            <p>{{ __('the language doesn\'t matter') }}</p>
{{--
            <ul class="actions">
                <li><a href="#content" class="button big special">Sign Up</a></li>
                <li><a href="#elements" class="button big alt">Learn More</a></li>
            </ul>
--}}
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
                        @if($beginning)
                        <h3>{{ $beginning->title }}</h3>
                        <p>{{ $beginning->annotation }}</p>
                        <ul class="actions">
                            <li><a href="{{ $beginning->GetUrl(['section' => 'development', ]) }}" class="button alt">{{ __('Learn More') }}</a></li>
                        </ul>
                        @else
                            {{-- ???? --}}
                        @endif
                    </section>
                    <hr />
                    <section>
                        <h3>Recent Blog Articles</h3>
                        <ul class="alt">
                    @foreach($blogCategory->publicPosts(4) as $post)
                            <li><a href="{{ $post->getUrl(['section' => 'development', ]) }}">{{ $post->title }}</a></li>
                    @endforeach
                            {{--<li><a href="#">Erat blandit risus vis adipiscing</a></li>--}}
                            {{--<li><a href="#">Tempus ultricies faucibus amet</a></li>--}}
                            {{--<li><a href="#">Arcu commodo non adipiscing quis</a></li>--}}
                            {{--<li><a href="#">Accumsan vis lacinia semper</a></li>--}}
                        </ul>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!-- One -->
    <section id="one" class="wrapper style1">
        <header class="major">
            <h2>My strengths</h2>
            <p>Feel the difference</p>
        </header>
        <div class="container">

            <div class="row">
                <div class="4u">
                    <section class="special box">
                        <i class="icon major goal">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
                                <metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
                                <g><g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"><path d="M7029.5,5010.1c-63.4-17.3-274.6-107.5-470.4-201.6c-195.8-94.1-407.1-186.3-470.4-203.5c-142.1-42.2-372.5-42.2-489.6-1.9c-46.1,17.3-88.3,28.8-92.2,25c-1.9-3.8,36.5-280.3,86.4-612.5c105.6-693.1,74.9-629.8,316.8-670.1c211.2-36.5,366.7,3.8,798.7,211.2c197.8,96,407.1,188.2,464.7,207.4c134.4,44.2,380.2,46.1,499.2,1.9c46.1-17.3,86.4-28.8,90.3-26.9c1.9,1.9-63.4,78.7-144,170.9c-136.3,153.6-270.7,280.3-449.3,428.2l-71,57.6l97.9,144c117.1,172.8,217,288,313,364.8l73,57.6l-74.9,30.7C7403.9,5037,7169.7,5044.7,7029.5,5010.1z"/><path d="M5071.1,4606.9c-26.9-25-48-59.5-48-76.8c0-25,472.3-3145,549.1-3640.4l11.5-71l-284.2-11.5c-157.5-7.7-316.8-15.4-357.1-17.3c-69.1-3.8-73,0-291.8,291.8C4328,1508,4262.7,1579,4141.8,1640.4c-165.1,82.6-366.7,149.8-581.8,192l-195.8,40.3l-34.6-44.2c-19.2-25-73-99.8-119-169l-86.4-124.8l115.2-802.6l115.2-804.5l-65.3-78.7c-36.5-44.2-96-113.3-130.6-151.7l-65.3-73l-126.7,149.8L2840-76.1l111.4,775.7c61.4,428.2,111.4,794.9,113.3,817.9c0,21.1-51.8,109.4-113.3,195.8c-130.6,176.7-96,167.1-403.2,107.5c-169-32.6-266.9-32.6-320.7-1.9c-23,13.4-136.3,113.3-253.4,224.6l-213.1,201.6l-270.7,526.1c-147.9,289.9-284.2,545.3-303.4,564.5c-122.9,136.3-347.5,113.3-445.5-48c-74.9-122.9-61.4-167,243.9-771.9l282.2-558.7l220.8-220.8c122.9-122.9,337.9-332.2,478.1-468.5c140.2-136.3,278.4-282.3,307.2-324.5l51.8-78.7l9.6-1970l9.6-1970l53.8-80.6l51.8-80.6l-71-44.2c-40.3-25-201.6-126.7-361-224.6C1432.6-3870.1,178.8-4699.6,100-4774.5c-11.5-9.6,2018-17.3,4890.4-17.3H9900v660.5v662.4l-111.4,84.5c-380.2,293.8-1167.4,766.1-1760.7,1058c-779.5,385.9-1424.7,595.2-1902.8,620.2c-403.2,23-944.7-122.9-1655.1-445.5c-101.8-46.1-188.2-80.6-192-76.8c-3.8,1.9-99.8,337.9-217,741.2L3851.8-750V12.2c0,428.2,7.7,781.5,17.3,808.3c23,59.5,96,128.7,136.3,128.7c17.3,0,140.2-144,278.4-322.6c138.2-178.6,270.7-339.9,297.6-361c55.7-42.2,226.6-48,771.9-21.1l318.7,15.4l13.5-101.8c7.7-55.7,69.1-455,134.4-889c134.4-867.9,128.7-854.4,272.7-854.4c73,0,159.4,69.1,159.4,128.6c0,19.2-55.7,401.3-124.8,850.6c-69.1,449.3-124.8,833.3-124.8,854.4c0,23,23,51.8,57.6,71c213.1,121,155.5,460.8-86.4,506.9c-51.9,9.6-65.3,21.1-74.9,71c-5.8,34.6-132.5,860.2-280.3,1837.5s-280.3,1801-291.9,1829.8C5286.1,4666.5,5151.7,4689.5,5071.1,4606.9z M3264.3-1301.1c263.1-833.3,374.4-1188.5,380.2-1219.2c3.8-23-74.9-76.8-299.5-201.6c-169-92.2-309.1-169-313-169c-11.5,0-5.8,1895.1,7.7,1906.6c5.8,7.7,36.5,13.4,65.3,13.4C3158.7-970.8,3160.6-976.6,3264.3-1301.1z"/><path d="M2953.3,3520.2c-441.6-86.4-714.3-541.4-581.8-971.6c144-468.5,689.3-683.5,1109.8-435.8c433.9,253.4,506.9,852.5,145.9,1202C3440.9,3495.2,3200.9,3570.1,2953.3,3520.2z"/></g></g>
                            </svg>
                        </i>
                        <h3>Focus on results</h3>
                        <p>
                            <b>Each project is unique.</b><br />
                            Even if 2 projects seem alike, the goals that bring results tend to be different due to different context.
                            Every single word of project description matters since every single word may significantly change the purpose of the application.
                            {{--IMHO it makes results focus the best way of development.--}}
                            {{--There is no (yet) a program, that can solve any --}}
                            {{--An application is created to undertake specific client's tasks, if it doesn't--}}
                            {{--that in modern IT world significantly changes at least every year.--}}
                            My primary goal is to deliver the expected results with choosing the best applicable solutions and technologies.
                        </p>
                    </section>
                </div>
                <div class="4u">
                    <section class="special box">
                        <i class="icon major flexible">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
                                <metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
                                <g><g><path d="M502.8,408.4c-18.2-36-38.5-73.6-64.9-110.1c4.7-4.5,9.5-8.8,14.5-13.1c71.7-61.5,167.4-91.3,292.5-91.3V10l245,245L745,500V316.2C615.8,316.2,549.1,352.4,502.8,408.4z M745,683.7c-207.1,0-253.7-93.2-312.7-211.1c-32.9-65.6-66.8-133.5-129.8-187.5c-71.7-61.5-167.4-91.3-292.5-91.3v122.5c207.1,0,253.7,93.2,312.7,211.2c32.8,65.7,66.8,133.5,129.8,187.5c71.7,61.5,167.4,91.3,292.5,91.3V990l245-245L745,500V683.7z M10,683.7v122.5c125.2,0,220.8-29.8,292.5-91.3c5-4.3,9.8-8.7,14.5-13.2c-26.4-36.6-46.6-74.2-64.9-110.2C205.9,647.5,139.2,683.7,10,683.7z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></g>
                            </svg>
                        </i>
                        <h3>Changes ready solutions</h3>
                        <p>
                            <b>Everything is changing.</b><br />
                            Solid solutions are usually short-lived. If the system can't be tweaked to fulfill updated
                            requirements in reasonable time it becomes futile.
                            Years of development experience made me capable with foreseeing possible upcoming changes and
                            deliver a forward-looking solution.
                        </p>
                    </section>
                </div>
                <div class="4u">
                    <section class="special box">
                        <i class="icon major puzzle">
                            <svg class="icon" height="512" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M821.361325 255.409041c-77.43972-51.922557-184.387497-63.049988-261.829264-29.66974-47.941895 18.541285-103.255689 66.75845-129.073704 129.811508-7.374968 18.542308-11.06194 40.798195-14.745842 63.051011-7.379061 29.673833-7.379061 55.636135-18.441001 77.888951-3.689019 14.832823-14.755052 25.966395-33.194006 37.089733 3.691065 3.705392 7.374968 3.705392 14.754029 3.705392 11.062963 0 25.811876 0 33.187867-3.705392 40.567951-14.833847 51.629891-40.799218 70.068845-70.467935 22.127973-37.092803 59.005882-63.055105 106.942661-59.344596 29.502941 0 44.257993 11.128455 55.320956 14.833847 36.873816 22.25077 51.628868 66.762543 55.31584 92.721775 3.687996 0 3.687996 14.838963 3.687996 18.547425 7.371898 48.216141 0 85.306898-11.062963 126.103046-47.941895 148.362003-202.827475 248.499677-365.090069 207.701482-66.382896-18.543332-125.383662-59.338457-173.327604-111.267153l-7.375991-7.413853c0 0 3.685949 7.413853 3.685949 11.125385 14.754029 18.540262 25.816992 33.378202 40.568974 51.92051 36.877909 37.09178 77.443813 70.468958 121.694643 89.01843 11.063987 3.705392 22.12695 7.414877 33.19503 11.126408 7.369851 0 14.747889 3.703345 22.125927 3.703345 7.371898 3.712555 14.746866 3.712555 22.124903 3.712555 22.124903 3.709485 40.564881 3.709485 62.692854 3.709485 36.871769 0 73.752748-11.125385 103.255689-22.251793 14.753005-3.711532 29.502941-11.126408 44.249807-18.549471 14.755052-7.416923 25.819039-14.833847 36.882002-22.25077C743.916489 778.372743 795.545356 644.849704 784.48137 518.747681c-3.685949-22.255887-7.375991-48.218188-14.748912-70.471005 0 0 3.686972 0 3.686972 3.709485 7.377014 11.127432 14.754029 22.252817 22.125927 29.668717 3.690042 14.836917 11.062963 33.382295 14.755052 48.217165 11.06194 33.379225 11.06194 55.633065 11.06194 55.633065 0 55.637158-3.691065 107.558691-22.125927 152.067394-22.13002 59.343573-66.382896 111.568005-118.010741 148.660808-44.25083 33.376155-95.879698 54.748928-158.572552 67.060325l7.371898 0c40.566928 0 81.132832-4.007267 118.011764-18.845207 29.501918-11.128455 62.690808-26.110681 92.193749-48.368614 36.875862-25.964348 70.070892-63.125713 92.196819-103.923908 44.249807-77.888951 59.002812-174.361143 44.249807-270.792403-7.370875-37.09178-18.438954-70.491471-33.18889-100.159164-7.377014-18.549471-14.753005-37.102013-22.125927-48.227398l3.685949 3.705392c3.691065 3.706415 7.379061 7.40976 11.063987 11.121292 25.816992 25.963325 44.25697 51.922557 62.691831 89.01229 3.692089 11.127432 7.378038 25.964348 11.063987 37.089733 7.374968 18.550495 11.066033 40.802288 11.066033 55.635111 3.686972 29.670763 0 51.92665 0 74.179466-3.691065 22.252817-7.375991 48.215118-14.753005 74.17742-3.685949 7.416923-7.378038 22.255887-11.063987 33.383318 3.686972-7.423063 3.686972-11.127432 7.379061-14.838963 11.062963-14.836917 29.500894-55.633065 36.874839-85.305875 3.689019-14.8318 7.374968-29.668717 11.06194-44.50768 3.691065-14.836917 3.691065-25.963325 7.377014-37.087687C968.87296 448.276676 917.247162 325.877999 821.361325 255.409041L821.361325 255.409041zM821.361325 255.409041M491.693 557.318138c12.496615-3.969405 21.869077-7.934716 28.116361-15.870456 12.497639-15.864316 15.620769-31.733749 34.363645-47.604204 6.246261-7.930623 12.490475-11.900028 18.741853-15.865339-9.371438-3.970428-18.741853-7.93574-28.117384-7.93574-21.86703-3.969405-34.361599 7.93574-46.855144 27.76946-15.618723 23.804149-24.993231 43.635823-46.861284 47.603181 3.124154 3.968381 9.370415 7.933693 12.493545 7.933693C469.824947 557.318138 482.323609 557.318138 491.693 557.318138L491.693 557.318138zM491.693 557.318138M202.635605 764.602112c77.44586 55.365982 180.698478 66.438155 261.83438 33.217543 47.936779-18.454304 99.565646-66.435085 125.383662-129.185244 7.375991-22.145369 14.747889-40.599673 18.438954-62.746066 3.687996-33.217543 3.687996-59.053977 14.748912-81.199347 7.377014-11.073196 18.439978-25.836435 33.189913-33.218566-3.687996-3.691065-7.370875-3.691065-11.062963-3.691065-14.749936-3.690042-25.811876 0-36.875862 3.691065-36.879955 14.764262-47.942919 40.600697-66.381873 66.438155-25.812899 36.906561-58.999742 66.439178-106.940614 62.745043-33.18889 0-44.2539-11.07422-55.316863-14.760169-40.564881-25.840528-55.319933-70.13229-59.004859-92.278683 0 0-3.691065-14.763239-3.691065-22.145369-7.369851-44.290739 0-84.891436 11.063987-121.800044 47.943942-147.636478 202.827475-247.290129 365.090069-206.691479 70.069869 18.455327 125.382639 59.055001 177.011506 107.036805-11.06194-18.452257-25.812899-33.216519-40.565904-51.671846-33.187867-36.908608-73.754794-70.12615-121.69669-88.582501-11.062963-3.690042-18.435884-7.380084-33.19196-11.07115-7.374968-3.690042-14.746866-3.690042-22.124903-7.382131-7.374968 0-11.062963 0-22.124903-3.690042-22.125927-3.692089-40.564881-3.692089-59.005882-3.692089-40.564881 0-73.752748 11.07422-106.941638 22.146393-11.062963 7.382131-29.500894 14.765285-44.255946 22.147416-11.063987 7.382131-25.812899 14.762215-36.875862 22.145369-106.946754 77.508281-154.883533 210.382545-147.511635 335.877747 3.518127 21.125133 7.072069 42.288129 13.793144 66.618257 0.230244 0.071631 0.402159 0.192382 0.533143 0.337691 0.021489 0.020466 0.030699 0.054235 0.046049 0.073678 0.103354 0.138146 0.176009 0.310062 0.230244 0.517793 0.01535 0.058328 0.028653 0.132006 0.037862 0.197498 0.038886 0.215918 0.068562 0.475837 0.084934 0.76748 0.004093 0.081864 0.010233 0.165776 0.014326 0.257873 0.008186 0.387833 0.014326 0.74599 0.014326 1.27504-0.341784-1.191128-0.633427-2.566452-0.959861-3.589758l0 0c-0.25071 0-0.586354-0.037862-0.983397-0.062422-0.088004-0.01228-0.171915 0.027629-0.264013 0.023536-0.417509-0.016373-0.883113 0-1.478677 0-7.375991-11.07422-14.755052-22.137183-18.438954-33.207309-7.380084-14.766308-14.755052-29.525454-18.441001-44.286646-7.378038-33.220612-7.378038-55.364959-7.378038-55.364959-3.685949-55.364959 3.687996-107.036805 22.125927-151.329591 22.12695-59.052954 62.693878-110.725824 114.319675-147.633409 47.944965-36.910655 95.887884-55.364959 162.263617-66.438155 0-3.689019-11.062963 0-11.062963-3.689019-40.565904 3.689019-77.43972 7.380084-114.318652 22.145369-33.18889 7.382131-66.376757 25.836435-92.195795 44.289716-40.565904 29.528524-70.068845 66.437132-95.879698 107.037828-40.565904 77.515445-59.005882 173.47803-44.25697 265.750573 7.375991 40.599673 18.438954 70.127174 33.194006 103.346763 7.374968 14.760169 18.438954 36.907585 25.810852 47.981804 0 0-3.685949-3.693112-7.371898-3.693112l-11.063987-11.069103c-25.815969-25.837458-44.255946-51.673893-59.003835-88.582501-7.377014-14.764262-11.063987-25.837458-14.753005-40.600697-3.686972-14.764262-7.373944-36.909631-11.063987-51.67287 0-29.528524 0-51.67287 3.690042-73.818239 0-22.145369 7.373944-47.981804 14.749936-77.510328 0-7.381108 7.377014-22.146393 11.062963-29.525454-7.378038 7.379061-7.378038 7.379061-11.062963 14.762215-11.062963 14.763239-25.813922 55.363935-36.879955 81.202417-3.684926 18.452257-7.372921 29.525454-11.063987 47.980781 0 11.073196-3.685949 25.837458-3.685949 36.908608C55.12704 576.35982 106.756931 698.16805 202.635605 764.602112L202.635605 764.602112zM202.635605 764.602112" /></svg>
                        </i>
                        <h3>Refactoring</h3>
                        <p>
                            <b>Code can live longer.</b><br />
                            Even perfectly working code may become useless when surroundings
                            (requirements, server, 3rd party environment, ...) has changed.
                            However it doesn't mean the code is doomed to die out, competently performed refactoring may
                            let it rise like a Phoenix as a new solution or as a library that can keep living in other
                            bigger projects.
                        </p>
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