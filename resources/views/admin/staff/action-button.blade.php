<div class="action d-flex">
    <div>
        <a id="11" href="{{route('admin.staffs.edit', $staff->id)}}" title="Edit Customer">
            <span class="icon pencil-lg-icon"></span>
        </a>
    </div>
    
    <div>
        <form action="{{route('admin.staffs.destroy', $staff->id)}}" method="POST" class="confirm-text">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-link" style="box-shadow: none; padding: 0">
                <span class="icon trash-icon"></span>
            </button>
        </form>
    </div>
    {{-- <a id="11"
        href="http://127.0.0.1:8080/admin/customers/note/11" data-method="GET"
        data-action="http://127.0.0.1:8080/admin/customers/note/11"
        data-token="VP2CTKboEXiwHHwlvwUVE1uhmHdAXRPrJaWcnLjg" target="" title="Add Note On This Customer"><span
            class="icon note-icon"></span></a><a id="11"
        href="http://127.0.0.1:8080/admin/customers/loginascustomer/11" data-method="GET"
        data-action="http://127.0.0.1:8080/admin/customers/loginascustomer/11"
        data-token="VP2CTKboEXiwHHwlvwUVE1uhmHdAXRPrJaWcnLjg" target="blank" title="login as customer"><span
            class="icon login-icon"></span></a><a id="11" href="javascript:void(0);" data-method="POST"
        data-action="http://127.0.0.1:8080/admin/customers/delete/11"
        data-token="VP2CTKboEXiwHHwlvwUVE1uhmHdAXRPrJaWcnLjg" target="" title="Delete Customer"><span
            class="icon trash-icon"></span></a> --}}
</div>
