@component('layouts.page')
    <div class="mx-auto">
        <div data-pages="card" class="card card-default" id="card-basic">
            <div class="card-header  ">
                <div class="card-title">Portlet Title
                </div>
                <div class="card-controls">
                    <ul>
                        <li><a data-toggle="collapse" class="card-collapse" href="#"><i class="card-icon card-icon-collapse"></i></a>
                        </li>
                        <li>
                            <a data-toggle="refresh" class="card-refresh" href="#">
                                <i class="card-icon card-icon-refresh"></i>
                            </a>
                        </li>
                        <li><a data-toggle="close" class="card-close" href="#"><i class="card-icon card-icon-close"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                <h3>
                    <span class="semi-bold">Basic</span> Tools</h3>
                <p>Basic Portlet tools include a slide toggle button <i class="card-icon card-icon-collapse"></i>, refresh button <i class="card-icon card-icon-refresh"></i> and a close button <i class="card-icon card-icon-close"></i> All these are fully customizable and come with callback functions to integrate with your code. Clicking on the refresh button will simulate an AJAX call.
                </p>
            </div>
        </div>
    </div>
@endcomponent