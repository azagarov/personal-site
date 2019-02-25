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
                        <h3>Results focus</h3>
                        <p>Eu non col commodo accumsan ante mi. Commodo consectetur sed mi adipiscing accumsan ac nunc tincidunt lobortis.</p>
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
                        <h3>Changes ready code</h3>
                        <p>Eu non col commodo accumsan ante mi. Commodo consectetur sed mi adipiscing accumsan ac nunc tincidunt lobortis.</p>
                    </section>
                </div>
                <div class="4u">
                    <section class="special box">
                        <i class="icon major puzzle">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve">
                                <metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
                                <g><g transform="translate(0.000000,511.000000) scale(0.100000,-0.100000)"><path d="M6175.9,4964c-186.2-34.8-368.3-221-368.3-378.5v-51.2h-665h-665v-624.1v-622l88-38.9c176-79.8,243.5-212.8,243.5-474.7c0-116.6-12.3-202.6-34.8-259.9c-40.9-102.3-151.4-206.7-237.4-225.1l-59.3-10.2v-652.7V973.9h665h665v-55.3c0-81.8,75.7-223,155.5-290.5c143.2-116.6,327.4-135.1,497.2-51.2c122.8,61.4,218.9,190.3,241.4,319.2l12.3,77.8H7375h663v673.2v671.2l81.8,12.3c163.7,20.5,327.4,184.2,360.1,356c45,235.3-133,493.1-364.2,532l-77.8,12.3v650.7v652.7h-665c-654.8,0-665,0-665,40.9c0,22.5-14.3,75.7-32.7,118.7C6595.4,4886.2,6380.6,5002.8,6175.9,4964z M6413.3,4716.4c55.3-45,79.8-108.4,90-243.5l10.2-133l660.9-6.1l658.9-4.1v-654.8v-654.8h143.2c133,0,149.4-4.1,214.9-65.5c92.1-83.9,112.5-184.2,61.4-290.6c-45-96.2-126.9-137.1-290.6-151.4l-128.9-10.2v-660.9v-663h-665h-665v-135c0-151.4-34.8-229.2-122.8-282.4c-108.4-63.4-266-28.6-331.5,73.7c-18.4,26.6-38.9,114.6-47.1,196.4l-14.3,147.3H5335h-652.7v478.8v476.8l79.8,53.2c176,116.6,249.6,290.6,251.7,579.1c2,290.5-90,501.3-255.8,591.3l-75.7,40.9v464.5v466.5H5335h650.7l14.3,143.2c16.4,163.7,75.7,253.7,182.1,282.4C6255.8,4775.7,6366.2,4755.2,6413.3,4716.4z"/><path d="M569.4,3879.5v-654.8h-55.3c-81.8-2.1-210.8-65.5-286.5-139.1c-251.7-251.7-110.5-697.7,241.5-757.1l90-16.4l6.1-669.1l4.1-669.1h683.4h681.4l12.3-85.9c36.8-272.1,380.6-442,648.6-321.2c151.4,69.6,239.4,178,276.2,341.7l14.3,65.5h683.4h683.4v675.2v675.2h51.2c128.9,0,288.5,110.5,360.1,249.6c55.2,108.4,53.2,290.6-8.2,407.2c-55.2,106.4-208.7,216.9-323.3,235.3l-79.8,14.3v650.7v652.7h-681.4h-683.4l-24.6-116.6c-34.8-149.4-167.8-290.5-313.1-331.5c-280.3-79.8-575,94.1-605.7,356l-10.2,92.1h-681.4H569.4V3879.5z"/><path d="M589.9-1051.8V-2832H1261h669.1l26.6-106.4c49.1-212.8,221-343.8,442-343.8c75.7,0,157.6,16.4,208.7,38.9c112.5,51.2,225.1,188.2,253.7,311l24.6,100.3h673.2h673.2v660.9v660.9l-96.2,24.5c-173.9,47.1-272.1,206.7-272.1,444c0,241.4,112.5,421.5,282.4,450.2l85.9,14.3V75.6v652.7h-654.8h-652.7l-26.6-85.9c-34.8-114.6-153.5-233.3-266-264c-49.1-12.3-173.9-18.4-284.4-14.3c-255.8,10.2-343.8,61.4-425.6,243.5l-53.2,120.7h-638.4H589.9V-1051.8z M1807.4,431.7c67.5-116.6,188.3-206.7,333.5-247.6c161.7-47.1,470.6-32.7,607.7,30.7c116.6,51.2,241.4,165.7,278.3,249.6l22.5,59.3h489h489V55.2v-468.6l-61.4-24.6c-79.8-32.7-198.5-167.8-249.6-282.4c-51.2-116.6-69.6-366.3-38.9-519.7c32.7-151.4,128.9-296.7,251.7-374.5l96.2-61.4v-474.7l2-476.7h-675.2H2677v-112.5c0-212.8-94.1-337.6-257.8-337.6c-186.2,0-257.8,79.8-274.2,296.7l-10.2,143.2l-669.1,6.1l-671.1,4.1v1575.6V523.7h478.8h478.8L1807.4,431.7z"/><path d="M4661.8-49.2c0-270.1,8.2-491.1,16.4-491.1c8.2,0,57.3,40.9,106.4,92.1l92.1,92.1l708-708l708-708l12.3,112.5c20.5,198.5,128.9,349.9,292.6,403.1c40.9,14.3,133,20.5,208.7,16.4l135.1-8.2l-744.8,730.5l-746.9,732.5l112.5,112.5l110.5,114.6h-505.4h-505.4V-49.2z"/><path d="M7610.3-914.7c-106.4-114.6-270.1-288.5-362.2-388.8l-167.8-178l-77.8,45c-229.2,135-540.2-49.1-540.2-317.2c0-73.7,34.8-173.9,85.9-241.4c20.5-28.7-30.7-90-339.7-419.5l-362.2-386.7l251.7-235.3c139.1-128.9,315.1-294.7,390.8-368.3l141.2-135l-45-85.9c-96.2-182.1-16.4-411.3,171.9-497.2c114.6-51.2,210.8-49.1,331.5,12.3l98.2,51.2l53.2-47.1c28.7-26.6,196.4-184.2,374.4-349.9c178-165.7,329.4-298.7,339.7-294.6c12.3,4.1,656.8,685.5,710,750.9c4.1,4.1,47.1-12.3,96.2-36.8c261.9-126.8,546.3,69.6,521.8,360.1c-6.1,69.6-26.6,133-53.2,169.8l-45,61.4l358.1,382.6c196.4,210.8,358.1,388.8,358.1,397c0,6.1-131,135-290.6,286.5c-161.6,149.4-331.5,309-378.5,351.9L9147-1946l-57.3-45c-59.3-47.1-173.9-57.3-261.9-22.5c-69.6,24.6-233.3,176-270.1,247.6c-36.8,71.6-34.8,198.5,2,263.9c16.4,28.7,28.7,57.3,30.7,63.4c0,12.3-769.4,734.6-781.7,734.6C7804.7-706,7716.7-800.1,7610.3-914.7z"/></g></g>
                            </svg>
                        </i>
                        <h3>Refactoring</h3>
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