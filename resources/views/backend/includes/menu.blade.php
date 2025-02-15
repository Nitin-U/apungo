    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="/" target="_blank">
                        <i class="ri-rocket-line"></i> <span data-key="t-landing">Landing</span>
                        <span class="badge badge-pill bg-success" data-key="t-new">{{auth()->user()->user_type}}</span>
                    </a>
                </li>

                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Components</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{request()->route()->getName() == 'backend.menu.index' ? 'active':''}}" href="{{route('backend.menu.index')}}">
                        <i class="ri-stack-line"></i> <span data-key="t-widgets">Menu</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#sidebarHomepageMultilevel" data-bs-toggle="collapse" role="button" aria-controls="sidebarHomepageMultilevel">
                        <i class="ri-ancient-pavilion-line"></i> <span data-key="t-multi-level-homepage">Homepage</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarHomepageMultilevel" style="">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('backend.homepage.slider.index') }}"
                                   class="nav-link {{request()->route()->getName() == 'backend.homepage.slider.index' ? 'active':''}}"
                                   data-key="t-multi-level-homepage"> Slider </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.homepage.welcome.create') }}"
                                   class="nav-link {{request()->route()->getName() == 'backend.homepage.welcome.create' ? 'active':''}}"
                                   data-key="t-multi-level-homepage"> Welcome </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.homepage.call_action.create') }}"
                                   class="nav-link {{request()->route()->getName() == 'backend.homepage.call_action.create' ? 'active':''}}"
                                   data-key="t-multi-level-homepage"> Call Action </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.homepage.core_value.create') }}"
                                   class="nav-link {{request()->route()->getName() == 'backend.homepage.core_value.create' ? 'active':''}}"
                                   data-key="t-multi-level-homepage"> Core Value </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.homepage.mission_vision.create') }}"
                                   class="nav-link {{request()->route()->getName() == 'backend.homepage.mission_vision.create' ? 'active':''}}"
                                   data-key="t-multi-level-homepage"> Mission, Vision & Value </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.homepage.why_us.create') }}"
                                   class="nav-link {{request()->route()->getName() == 'backend.homepage.why_us.create' ? 'active':''}}"
                                   data-key="t-multi-level-homepage">Why Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.homepage.recruitment_process.create') }}"
                                   class="nav-link {{request()->route()->getName() == 'backend.homepage.recruitment_process.create' ? 'active':''}}"
                                   data-key="t-multi-level-homepage">Recruitment Process</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.homepage.general_grievance.create') }}"
                                   class="nav-link {{request()->route()->getName() == 'backend.homepage.general_grievance.create' ? 'active':''}}"
                                   data-key="t-multi-level-homepage">General Grievance</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#sidebarTourMultilevel" data-bs-toggle="collapse" role="button" aria-controls="sidebarTourMultilevel">
                        <i class="ri-links-line"></i> <span data-key="t-multi-level-career">Career</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarTourMultilevel" style="">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarBasicSetupPackage" class="nav-link collapsed" data-bs-toggle="collapse" role="button" aria-controls="sidebarBasicSetupPackage"
                                   data-key="t-level-basic-career"> Basic Setup
                                </a>
                                <div class="menu-dropdown collapse" id="sidebarBasicSetupPackage" style="">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('backend.career.basic_setup.category.index') }}"
                                               class="nav-link {{request()->route()->getName() == 'backend.career.basic_setup.category.index' ? 'active':''}}"
                                               data-key="t-level-basic-career"> Category </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.career.job.index') }}"
                                   class="nav-link {{request()->route()->getName() == 'backend.career.job.index' ? 'active':''}}"
                                   data-key="t-multi-level-career"> Job </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.career.company_career.index') }}"
                                   class="nav-link {{request()->route()->getName() == 'backend.career.company_career.index' ? 'active':''}}"
                                   data-key="t-multi-level-career"> Company Career </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link collapsed" href="#sidebarBlogMultilevel" data-bs-toggle="collapse" role="button" aria-controls="sidebarBlogMultilevel">
                        <i class="ri-newspaper-line"></i> <span data-key="t-multi-level-news">News</span>
                    </a>
                    <div class="menu-dropdown collapse" id="sidebarBlogMultilevel" style="">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarBasicSetupBlog" class="nav-link collapsed" data-bs-toggle="collapse" role="button" aria-controls="sidebarBasicSetupBlog"
                                   data-key="t-level-basic-blogs"> Basic Setup
                                </a>
                                <div class="menu-dropdown collapse" id="sidebarBasicSetupBlog" style="">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('backend.news.basic_setup.category.index') }}"
                                               class="nav-link {{request()->route()->getName() == 'backend.news.basic_setup.category.index' ? 'active':''}}"
                                               data-key="t-level-basic-blogs"> Category </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('backend.news.blog.index') }}"
                                   class="nav-link {{request()->route()->getName() == 'backend.news.blog.index' ? 'active':''}}"
                                   data-key="t-multi-level-news"> Blog </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link {{request()->route()->getName() == 'backend.page.index' ? 'active':''}}" href="{{route('backend.page.index')}}">
                        <i class="ri-pages-line"></i> <span data-key="t-widgets">Page</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{request()->route()->getName() == 'backend.testimonial.index' ? 'active':''}}" href="{{route('backend.testimonial.index')}}">
                        <i class="ri-hand-heart-line"></i> <span data-key="t-widgets">Testimonial</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link @if(\Request::route()->getName() == 'formbuilder::forms.index' || \Request::route()->getName() == 'formbuilder::forms.create' || \Request::route()->getName() == 'formbuilder::forms.edit') active @endif" href="{{route('formbuilder::forms.index')}}">
                        <i class="ri-pages-line"></i> <span data-key="t-widgets">Forms</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{request()->route()->getName() == 'backend.service.index' ? 'active':''}}" href="{{route('backend.service.index')}}">
                        <i class="ri-shopping-bag-line"></i> <span data-key="t-widgets">Service</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{request()->route()->getName() == 'backend.document.create' ? 'active':''}}" href="{{route('backend.document.create')}}">
                        <i class="ri-profile-line"></i> <span data-key="t-widgets">Document</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{request()->route()->getName() == 'backend.managing_director.index' ? 'active':''}}" href="{{route('backend.managing_director.index')}}">
                        <i class="ri-open-arm-line"></i> <span data-key="t-widgets">Managing Director</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{request()->route()->getName() == 'backend.team.index' ? 'active':''}}" href="{{route('backend.team.index')}}">
                        <i class="ri-team-line"></i> <span data-key="t-widgets">Team</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{request()->route()->getName() == 'backend.client.index' ? 'active':''}}" href="{{route('backend.client.index')}}">
                        <i class="ri-user-2-line"></i> <span data-key="t-widgets">Client</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{request()->route()->getName() == 'backend.album.index' ? 'active':''}}" href="{{route('backend.album.index')}}">
                        <i class="ri-gallery-line"></i> <span data-key="t-widgets">Album</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link {{request()->route()->getName() == 'backend.customer_inquiry.index' ? 'active':''}}" href="{{route('backend.customer_inquiry.index')}}">
                        <i class="ri-discuss-line"></i> <span data-key="t-widgets">Customer Inquiry</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{request()->route()->getName() == 'backend.page_heading.index' ? 'active':''}}" href="{{route('backend.page_heading.index')}}">
                        <i class="ri-h-1"></i> <span data-key="t-widgets">Page Heading</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{request()->route()->getName() == 'backend.user.user_management.index' ? 'active':''}}" href="{{route('backend.user.user-management.index')}}">
                        <i class="ri-account-circle-line"></i> <span data-key="t-widgets">User Mgmt.</span>
                    </a>
                </li>

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button"--}}
{{--                       aria-expanded="false" aria-controls="sidebarMultilevel">--}}
{{--                        <i class="ri-share-line"></i> <span data-key="t-multi-level">Multi Level</span>--}}
{{--                    </a>--}}
{{--                    <div class="collapse menu-dropdown" id="sidebarMultilevel">--}}
{{--                        <ul class="nav nav-sm flex-column">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="#" class="nav-link" data-key="t-level-1.1"> Level 1.1 </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button"--}}
{{--                                   aria-expanded="false" aria-controls="sidebarAccount" data-key="t-level-1.2"> Level--}}
{{--                                    1.2--}}
{{--                                </a>--}}
{{--                                <div class="collapse menu-dropdown" id="sidebarAccount">--}}
{{--                                    <ul class="nav nav-sm flex-column">--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a href="#" class="nav-link" data-key="t-level-2.1"> Level 2.1 </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="nav-item">--}}
{{--                                            <a href="#sidebarCrm" class="nav-link" data-bs-toggle="collapse"--}}
{{--                                               role="button" aria-expanded="false" aria-controls="sidebarCrm"--}}
{{--                                               data-key="t-level-2.2"> Level 2.2--}}
{{--                                            </a>--}}
{{--                                            <div class="collapse menu-dropdown" id="sidebarCrm">--}}
{{--                                                <ul class="nav nav-sm flex-column">--}}
{{--                                                    <li class="nav-item">--}}
{{--                                                        <a href="#" class="nav-link" data-key="t-level-3.1"> Level 3.1--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                    <li class="nav-item">--}}
{{--                                                        <a href="#" class="nav-link" data-key="t-level-3.2"> Level 3.2--}}
{{--                                                        </a>--}}
{{--                                                    </li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}




                {{--                <li class="nav-item">--}}
{{--                    <a class="nav-link menu-link  @if(\Request::route()->getName() == 'homepage.index') active @endif" href="{{route('homepage.index')}}">--}}
{{--                    <i class="ri-home-gear-line"></i> <span data-key="t-forms">Home</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link menu-link  @if(\Request::route()->getName() == 'menu.index') active @endif" href="{{route('menu.index')}}">--}}
{{--                    <i class="ri-stack-line"></i> <span data-key="t-forms">Menu</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link menu-link @if(\Request::route()->getName() == 'services.index') active @endif" href="{{route('services.index')}}">--}}
{{--                        <i class="ri-customer-service-2-line"></i> <span data-key="t-widgets">Services</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link menu-link @if(\Request::route()->getName() == 'jobcategory.index' || \Request::route()->getName() == 'job.index' ||  \Request::route()->getName() == 'job.create' || \Request::route()->getName() == 'job.edit') active @endif" href="#sidebarJobs" data-bs-toggle="collapse" role="button"--}}
{{--                    aria-expanded="false" aria-controls="sidebarJobs">--}}
{{--                        <i class="ri-links-line"></i> <span data-key="t-job-mgmt">Job Mgmt.</span>--}}
{{--                    </a>--}}
{{--                    <div class="collapse menu-dropdown @if(\Request::route()->getName() == 'jobcategory.index' || \Request::route()->getName() == 'job.index' ) show @endif" id="sidebarJobs">--}}
{{--                        <ul class="nav nav-sm flex-column">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('jobcategory.index')}}" class="nav-link @if(\Request::route()->getName() == 'jobcategory.index') active @endif" data-key="t-job-category">Category</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('job.index')}}" class="nav-link @if(\Request::route()->getName() == 'job.index') active @endif" data-key="t-job">Job</a>--}}
{{--                            </li>--}}

{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link menu-link @if(\Request::route()->getName() == 'blogcategory.index' || \Request::route()->getName() == 'blog.index' ||  \Request::route()->getName() == 'blog.create' || \Request::route()->getName() == 'blog.edit' ) active @endif" href="#sidebarBlogs" data-bs-toggle="collapse" role="button"--}}
{{--                       aria-expanded="false" aria-controls="sidebarBlogs">--}}
{{--                        <i class="ri-bold"></i> <span data-key="t-blog-mgmt">Blog Mgmt.</span>--}}
{{--                    </a>--}}
{{--                    <div class="collapse menu-dropdown @if(\Request::route()->getName() == 'blogcategory.index' || \Request::route()->getName() == 'blog.index' ) show @endif" id="sidebarBlogs">--}}
{{--                        <ul class="nav nav-sm flex-column">--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('blogcategory.index')}}" class="nav-link @if(\Request::route()->getName() == 'blogcategory.index') active @endif" data-key="t-blog-category">Category</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('blog.index')}}" class="nav-link @if(\Request::route()->getName() == 'blog.index') active @endif" data-key="t-blog">Blog</a>--}}
{{--                            </li>--}}

{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link menu-link @if(\Request::route()->getName() == 'pages.index') active @endif" href="{{route('pages.index')}}">--}}
{{--                        <i class="ri-pages-line"></i> <span data-key="t-widgets">Pages</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link menu-link @if(\Request::route()->getName() == 'formbuilder::forms.index' || \Request::route()->getName() == 'formbuilder::forms.create' || \Request::route()->getName() == 'formbuilder::forms.edit') active @endif" href="{{route('formbuilder::forms.index')}}">--}}
{{--                        <i class="ri-pages-line"></i> <span data-key="t-widgets">Forms</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link menu-link @if(\Request::route()->getName() == 'backend.user.user_management.index') active @endif" href="{{route('backend.user.user_management.index')}}">--}}
{{--                        <i class="ri-account-circle-line"></i> <span data-key="t-widgets">User Mgmt.</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link menu-link @if(\Request::route()->getName() == 'managing-director.index') active @endif" href="{{route('managing-director.index')}}">--}}
{{--                        <i class="ri-open-arm-line"></i> <span data-key="t-widgets">Managing Director</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link menu-link @if(\Request::route()->getName() == 'testimonials.index') active @endif" href="{{route('testimonials.index')}}">--}}
{{--                        <i class="ri-hand-heart-line"></i> <span data-key="t-widgets">Testimonial</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link menu-link @if(\Request::route()->getName() == 'teams.index') active @endif" href="{{route('teams.index')}}">--}}
{{--                        <i class="ri-team-line"></i> <span data-key="t-widgets">Teams</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link menu-link @if(\Request::route()->getName() == 'service-category.index') active @endif" href="{{route('service-category.index')}}">--}}
{{--                        <i class=" ri-price-tag-2-line"></i> <span data-key="t-widgets">Service Categories</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link menu-link @if(\Request::route()->getName() == 'album.index' || \Request::route()->getName() == 'album.show') active @endif" href="{{route('album.index')}}">--}}
{{--                        <i class="ri-gallery-line"></i> <span data-key="t-widgets">Albums</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link menu-link @if(\Request::route()->getName() == 'clients.index') active @endif" href="{{route('clients.index')}}">--}}
{{--                        <i class="ri-user-2-line"></i> <span data-key="t-widgets">Clients</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link menu-link @if(\Request::route()->getName() == 'subsidiary.index') active @endif" href="{{route('subsidiary.index')}}">--}}
{{--                        <i class="ri-user-4-line"></i> <span data-key="t-widgets">Subsidiary</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link menu-link @if(\Request::route()->getName() == 'sliders.index') active @endif" href="{{route('sliders.index')}}">--}}
{{--                        <i class="ri-slideshow-line"></i> <span data-key="t-widgets">Sliders</span>--}}
{{--                    </a>--}}
{{--                </li>--}}



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
