<!--session has is t/f if have, session get returns message -->
@if (Session::has('flash_message'))
	<div class="alert alert-success" {{ Session::has('flash_message_important') ? 'alert-important' : '' }}>
	@if (Session::has('flash_message_important'))
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	@endif
		{{ Session('flash_message') }}
		<!--Session::get('flash_message') does the same thing -->
	</div>
@endif