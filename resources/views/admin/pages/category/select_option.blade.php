<option style="{{ $category['parent_id'] == null ? 'font-weight:bold' : 'font-style:italic' }}" value="{{ $category['id'] }}">{{ $prefix }}{{ $category['name'] }}</option>
@if(count($category['children']) > 0)
    @foreach($category['children'] as $child)
        @include('admin.pages.category.select_option', ['category' => $child, 'prefix' => $prefix . ' - '])
    @endforeach
@endif
