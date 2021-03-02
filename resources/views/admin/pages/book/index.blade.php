@extends('admin.layout.master')

@section('content')
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

        <!-- begin:: Subheader -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">Books </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
            </div>

        </div>

        <!-- end:: Subheader -->

            <!-- begin:: Content -->
            <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__head kt-portlet__head--lg">
                        <div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<i class="kt-font-brand flaticon2-line-chart"></i>
										</span>
                            <h3 class="kt-portlet__head-title">
                                All books
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-wrapper">
                                <div class="kt-portlet__head-actions">

                                    <a href="{{route('books.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                                        <i class="la la-plus"></i>
                                        Add new book
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">

                        <!--begin: Datatable -->
                        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                            <thead>
                            <tr>
                                <th>Book ID</th>
                                <th>Book title</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $books as $book)
                            <tr>
                                <td>{{ $book->id }}</td>
                                <td>{{ $book->book_title }}</td>
                                <td>{{ $book->quantity }}</td>
                                <td>
                                    <span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">Active</span>
                                </td>
                                <td nowrap>
                                    <a href="{{ route('books.show', $book) }}" title="Edit details" class="btn btn-sm btn-clean btn-icon btn-icon-md"><i class="la la-edit"></i></a>
                                    <form action="{{ route('books.destroy',$book) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button title="Delete" class="btn btn-sm btn-clean btn-icon btn-icon-md" type="submit"><i class="la la-trash"></i></button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>

                        <!--end: Datatable -->
                    </div>
                </div>
            </div>

            <!-- end:: Content -->
        </div>
@endsection

