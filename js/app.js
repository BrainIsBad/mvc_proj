function make_msg(text) {
	return '<div class="msg_form"><div class="msg">' + text + '</div><a class="btn" id="msg_btn" onclick="rem_msg()">OK</a></div>';
}
jQuery.exists = function(selector) {
	return ($(selector).length > 0);
}

function rem_msg() {
	$('.block').remove();
	$('.msg_form').children().remove();
	$('.msg_form').remove();
}

var btn_del = '<button class="btn del">Удалить</button>'

$('#exit').on('click', function() {
	location.href = '../exit';
});
$('#users').on('click', function() {
	while ($.exists('#content'))
	{
		$('#content').remove();
	}
	$.ajax({
		url: 'js/ajax/users.php',
		success: function(msg) {
			data = $.parseJSON(msg);
			var table = '<div id="content"><table><tr><th>ИД</th><th>Имя</th><th>Фамилия</th><th></th></tr>';
			for(var i = 0; i < data.length; i++) {
				table += '<tr id="' + data[i].id + '"><td>' + data[i].id + '</td><td>' + data[i].name + '</td><td>' + data[i].surname + '</td><td>' + btn_del +'</td></tr>';
			}
			table += '</table></div>';
			$('body').append(table);
			$('.del').on('click', function() {
				var id = $(this).parent().parent().attr('id');
				$.ajax({
					url: 'js/ajax/del_user.php',
					type: 'GET',
					data: {id: id}
				});
				$(this).parent().parent().remove();
			});
		}
	});
});

$('#user_add').on('click', function() {
	while ($.exists('#content'))
	{
		$('#content').remove();
	}
	var form = '<div id="content"><div class="form_menu"><div class="form_wrap"><p><label for="name" class="label_main">Имя</label><input type="text" class="input_main name" placeholder="Имя"></p><p><label for="surname" class="label_main">Фамилия</label><input type="text" class="input_main surname" placeholder="Фамилия"></p><p><button class="btn bt_add_user">Добавить</button></p></div>';
	$('body').append(form);
	$('.bt_add_user').on('click', function() {
		var name = $('.name').val();
		var surname = $('.surname').val();
		if ($.trim(name) == '') {
			alert('Enter name!');
			return;
		}
		if ($.trim(surname) == '') {
			alert('Enter surname!');
			return;
		}
		else {
			$.ajax({
				url: 'js/ajax/add_user.php',
				type: 'GET',
				data: {
					name: name,
					surname: surname
				},
				success: function(data) {
					alert(data);
				}
			});
		}
	});
});

$('#criterias').on('click', function() {
	while ($.exists('#content'))
	{
		$('#content').remove();
	}
	$.ajax({
		url: 'js/ajax/criterias.php',
		success: function(msg) {
			data = $.parseJSON(msg);
			var table = '<div id="content"><table><tr><th>ИД</th><th>критерий</th><th></th></tr>';
			for(var i = 0; i < data.length; i++) {
				table += '<tr id="' + data[i].id + '"><td>' + data[i].id + '</td><td>' + data[i].criterion + '</td><td>' + btn_del +'</td></tr>';
			}
			table += '</table></div>';
			$('body').append(table);

			$('.del').on('click', function() {
				var id = $(this).parent().parent().attr('id');
				$.ajax({
					url: 'js/ajax/del_criterion.php',
					type: 'GET',
					data: {id: id}
				});
				$(this).parent().parent().remove();
			});
		}
	});
});

$('#criterion_add').on('click', function() {
	while ($.exists('#content'))
	{
		$('#content').remove();
	}
	var form = '<div id="content"><div class="form_menu"><div class="form_wrap"><p><label for="name" class="label_main">Критерий</label><input type="text" class="input_main criterion" placeholder="Критерий"></p><p><button class="btn bt_add_criterion">Добавить</button></p></div>';
	$('body').append(form);
	$('.bt_add_criterion').on('click', function() {
		var name = $('.criterion').val();
		if ($.trim(name) == '') {
			alert('Enter criterion!');
			return;
		}
		else {
			$.ajax({
				url: 'js/ajax/add_criterion.php',
				type: 'GET',
				data: {criterion: name},
				success: function(data) {
					alert(data);
				}
			});
		}
	});
});

$('#rate').on('click', function() {
	while ($.exists('#content'))
	{
		$('#content').remove();
	}
	$.ajax({
		url: 'js/ajax/users.php',
		success: function(msg) {
			data = $.parseJSON(msg);
			var select = '<div id="content"><div class="rate_wrap"><select id="user_mark">';
			for(var i = 0; i < data.length; i++) {
				select += '<option></div>' + data[i].name + ' ' + data[i].surname + '</option>';
			}
			select += '</select>';
			$('body').append(select);
		}
	});
	$.ajax({
		url: 'js/ajax/criterias.php',
		success: function(msg) {
			data = $.parseJSON(msg);
			var table = '<div id="content"><table><tr><th>ИД</th><th>критерий</th><th>оценка</th></tr>';
			for(var i = 0; i < data.length; i++) {
				table += '<tr id="' + data[i].id + '"><td>' + data[i].id + '</td><td class="criterion_name">' + data[i].criterion + '</td><td><input type="number" class="mark_' + data[i].id +'" min="0" max="10" value="0"></td></tr>';
			}
			table += '</table><div class="rate_wrap"><button class="btn do_rate">Поставить</button></div></div>';
			$('body').append(table);

			$('.do_rate').on('click', function() {
				var user = $('#user_mark').val();
				var marks_name = $('.criterion_name').map(function() {
					return $(this).text();
				}).get();
				var marks_values = $('input').map(function() {
					return $(this).val();
				}).get();
				var marks = {};
				for (var i = 0; i < marks_name.length; i++) {
					var name = marks_name[i];
					var val = marks_values[i];
					marks[name] = val;
				}
				$.ajax({
					url: 'js/ajax/rate.php',
					type: 'GET',
					data: {
						user: user,
						marks: marks
					},
					success: function(data) {
						alert(data);
					}
				});
			});
		}
	});
});