@extends('admin.layouts.default')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Category list</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-content">
                                    <div class="basic-list-group">
                                        <ul class="list-group" id="dragRoot">
                                            @foreach ($categories as $category)
                                                @include('admin.pages.category.partial', ['category' => $category])
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create category</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-content">
                                    <div class="basic-form">
                                        <form id="category-add">
                                            <div class="row align-items-center">
                                                <div class="col-md-6">
                                                    <label>Category name</label>
                                                    <input type="text" name="name" class="form-control mb-2"
                                                           placeholder="Category name">
                                                </div>
                                                <div class="mb-2 col-md-6">
                                                    <label>Parent category</label>
                                                    <select id="inputState" name="parent_id"
                                                            class="default-select form-control wide">
                                                        <option value="0">As root category</option>
                                                        @foreach($categories as $category)
                                                            @include('admin.pages.category.select_option', ['category' => $category, 'prefix' => ''])
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('jq-bs-scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.9.0/dist/sweetalert2.all.min.js"></script>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="{{ asset('assets/js/drag-drop.js') }}" type="text/javascript"></script>
    @endpush
    @push('dg-dp')
    @endpush
@stop
