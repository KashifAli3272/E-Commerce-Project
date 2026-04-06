<tbody>
@forelse($categories as $key => $product)
<tr>
    <td>{{ $categories->firstItem() + $key }}</td>

    <td>
        @if($product->image)
            <img src="{{ asset('storage/'.$product->image) }}"
                 width="50"
                 height="50"
                 class="img-thumbnail">
        @else
            <span class="text-muted">No Image</span>
        @endif
    </td>

    <td>{{ $product->product_name }}</td>
    <td>{{ number_format($product->price, 2) }}</td>
    <td>{{ $product->brand->brand_name ?? '-' }}</td>
    <td>{{ $product->category->name ?? '-' }}</td>
    <td>{{ \Illuminate\Support\Str::limit($product->description, 40) }}</td>

    <td>
        @if($product->status)
            <span class="badge badge-success">Active</span>
        @else
            <span class="badge badge-danger">Inactive</span>
        @endif
    </td>

    <td class="text-center">
        <a href="{{ route('editproduct', $product->id) }}"
           class="btn btn-sm btn-warning">
            <i class="fas fa-edit"></i>
        </a>
    </td>
</tr>
@empty
<tr>
    <td colspan="9" class="text-center">No products found.</td>
</tr>
@endforelse
</tbody>

@if($categories->hasPages())
<div class="card-footer clearfix">
    {{ $categories->withQueryString()->links('pagination::bootstrap-4') }}
</div>
@endif
