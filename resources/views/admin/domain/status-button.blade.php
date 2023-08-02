<input id="change_status_{{ $domain->id }}" class="status-toggler" data-id="{{ $domain->id }}" type="checkbox" {{$domain->status === 'active' ? 'checked': ''}}
    data-on="Active" data-off="Inactive"
    data-onstyle="success" data-offstyle="danger">
