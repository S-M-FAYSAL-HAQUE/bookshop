@extends('admin.layout.master')

@section('content')
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

        <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">Dashboard </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
            </div>

        </div>

        <!-- end:: Subheader -->

        <!-- begin:: Content -->
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

            <div class="kt-portlet">
                <div class="kt-portlet__body  kt-portlet__body--fit">
                    <div class="row row-no-padding row-col-separator-xl">


                        <div class="col-md-12 col-lg-6 col-xl-4">

                            <!--begin::New Orders-->
                            <div class="kt-widget24">
                                <div class="kt-widget24__details">
                                    <div class="kt-widget24__info">
                                        <h4 class="kt-widget24__title">Total Books</h4>
                                        <span class="kt-widget24__desc"></span>
                                    </div>
                                    <a href="{{ route('books.index') }}"><span class="kt-widget24__stats kt-font-danger">{{ $total_books }}</span></a>
                                </div>

                            </div>

                            <!--end::New Orders-->
                        </div>
                        <div class="col-md-12 col-lg-6 col-xl-4">

                            <!--begin::New Users-->
                            <div class="kt-widget24">
                                <div class="kt-widget24__details">
                                    <div class="kt-widget24__info">
                                        <h4 class="kt-widget24__title">
                                            New Users
                                        </h4>
                                        <span class="kt-widget24__desc">
															Joined New User
														</span>
                                    </div>
                                    <span class="kt-widget24__stats kt-font-success">{{ $total_users }}</span>
                                </div>


                            </div>

                            <!--end::New Users-->
                        </div>

                        <div class="col-md-12 col-lg-6 col-xl-4">

                            <!--begin::Total Profit-->
                            <div class="kt-widget24">
                                <div class="kt-widget24__details">
                                    <div class="kt-widget24__info">
                                        <h4 class="kt-widget24__title">Total Profit</h4>
                                        <span class="kt-widget24__desc">All Customs Value</span>
                                    </div>
                                    <span class="kt-widget24__stats kt-font-brand">0.00</span>
                                </div>

                            </div>

                            <!--end::Total Profit-->
                        </div>
                    </div>
                </div>
            </div>


        <!-- end:: Content -->
    </div>
@endsection

