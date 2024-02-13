let star = document.querySelectorAll('input');
let showValue = document.querySelector('#rating-value');

for (let i = 0; i < star.length; i++) {
	star[i].addEventListener('click', function () {
		i = this.value;

		showValue.innerHTML = i + " out of 5";


		$.ajax({
			method: "POST",
			url: "./includes/ratting.php",
			data: {
				ratting: i
			},
			success: function (data) {
				// alert(data);
				if (data == 1) {
					const Toast = Swal.mixin({
						toast: true,
						position: 'top-end',
						showConfirmButton: false,
						timer: 3000,
						timerProgressBar: true,
						didOpen: (toast) => {
							toast.addEventListener('mouseenter', Swal.stopTimer)
							toast.addEventListener('mouseleave', Swal.resumeTimer)
						}
					})

					Toast.fire({
						icon: 'success',
						title: 'SUCCESSFULLY ADDED',
						background: '#D4EDDA',
						// color: 'white'
					})

				} else {
					const Toast = Swal.mixin({
						toast: true,
						position: 'top-end',
						showConfirmButton: false,
						timer: 3000,
						timerProgressBar: true,
						didOpen: (toast) => {
							toast.addEventListener('mouseenter', Swal.stopTimer)
							toast.addEventListener('mouseleave', Swal.resumeTimer)
						}
					})

					Toast.fire({
						icon: 'error',
						title: 'UNSUCCESFULL!',
						background: '#FFF3CD',
						// color: 'white'
					})

				}





			}
		});
	});
}