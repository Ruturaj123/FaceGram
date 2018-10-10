$('#editPost').on('click', function () {
	$.ajax({
		method: 'POST',
		url: urlEdit,
		data: {body: $('edit').val(), postId: post_id, _token: token}
	})
	.done(function() {
	})
});