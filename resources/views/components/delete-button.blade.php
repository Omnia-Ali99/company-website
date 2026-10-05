   <form action="{{ $href }}" method="POST" style="display: inline;">
   @csrf
  @method('DELETE')
 <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('{{ __('keywords.confirm_delete') }}')">
 <i class="fe fe-trash-2 fa-2x"></i>
</button>
</form>