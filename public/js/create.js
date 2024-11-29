'use strict';

const checkChairmanOfTheBoard = () => {
  $.ajax({
    url: '/api/check_chairman_of_the_board', // Laravel rotası
    type: 'GET',
    success: function(response,textStatus,xhr) {
      if(xhr.status == 200){
        $('.modal').addClass('d-none');
      }
    },
    error: function(xhr, status, error) {
      if(xhr.status == 404){

      }
    }
});
}

const loadDepartmentsToSelectById = (id) => {
  $.ajax({
      url: '/api/department', // Laravel rotası
      type: 'GET',
      success: function(response) {
        var options = `<option value="">Departman Seçiniz</option>`;
        const departments = response.data;
        departments.forEach(department => {
            options += `<option value="${department.id}">${department.title}</option>`;
        });
        $(`#${id}`).html(options)
      },
      error: function(xhr, status, error) {
          console.error('Hata:', error);
          alert('Bir hata oluştu!');
      }
  });
}

const loadWorkerTitlesToSelectById = (id) => {
  $.ajax({
    url: '/api/worker_title', // Laravel rotası
    type: 'GET',
    success: function(response) {
      var options = `<option value="">Unvan Seçiniz</option>`;
      const workerTitles = response.data;

      workerTitles.forEach(title => {
          options += `<option value="${title.id}">${title.title}</option>`;
      });

      $(`#${id}`).html(options)
    },
    error: function(xhr, status, error) {
      console.log(xhr,status);
        console.error('Hata:', error);
        alert('Bir hata oluştu!');
    }
  });
}

const checkParent = () => {
  const departmentVal = $('#department').val();
  const workerTitleVal = $('#worker_title').val();
  if(departmentVal && workerTitleVal){
    $.ajax({
      url: `/api/get_workers_by_department_and_title/${departmentVal}/${workerTitleVal}`, // Laravel rotası
      type: 'GET',
      success: function(response) {

        if(response.status && response.status == "info"){
          Swal.fire({
            icon: "warning",
            title: "Dikkat",
            text: response.message,
          });
        }else{
          const upperWorkers = response.data;
          if(upperWorkers.length == 0){
            alert("Bu departmanda seçtiğiniz ünvanın bir üst kişisi bulunmamaktadır. Bu kişi birine atanamayacağı için önce bir üst kişiyi eklemeniz gerekmektedir");
          }else if(upperWorkers.length == 1){
            var options = `<option value="${upperWorkers[0].id}">${upperWorkers[0].name}</option>`;
            $(`#upper_workers`).attr('disabled','disabled')
            $(`#upper_workers`).html(options)
            $('#upper-worker-info').html("Bu departmanda üst kişi olarak bir kişi olduğundan otomatik üst kişi olarak atanmıştır")
          }else{
            var options = `<option value="">Üst Kişi Seçiniz</option>`;
            upperWorkers.forEach(worker => {
                options += `<option value="${worker.id}">${worker.name}</option>`;
            });
            $(`#upper_workers`).removeAttr('disabled')
            $(`#upper_workers`).html(options)
            $('#upper-worker-info').html("Bu departmanda üst kişi olarak birden çok kişi bulunmaktadır. Lütfen seçeneklerden eklemek istediğiniz kişinin üst kişisini belirtiniz")
          }
        }
        
      },
      error: function(xhr, status, error) {
        alert('Bir hata oluştu!');
      }
    });
  }
}

(function($){
  $(function() {
    checkChairmanOfTheBoard();
    loadDepartmentsToSelectById('department');
    loadWorkerTitlesToSelectById('worker_title');

    $('#create_worker_form').submit((e) => {
      e.preventDefault(); // Sayfanın yenilenmesini engeller
      e.stopPropagation(); // Event'in yukarı doğru yayılmasını engeller
  
      // Form elemanını doğru şekilde seçip serialize işlemi yapıyoruz
      var formData = $('#create_worker_form').serialize(); // Form verilerini URL-encoded hale getirir
  
      $.ajax({
          url: '/api/worker', // Laravel'deki API rotası
          type: 'POST',       // HTTP metodu
          data: formData,     // Gönderilecek form verileri
          success: function(response,textStatus,xhr) {
            if(xhr.status == 201){
              Swal.fire({
                icon: "success",
                title: "Başarılı",
                text: "Başarıyla yeni bir çalışan eklediniz",
                showDenyButton: false,
                showCancelButton: false,
                confirmButtonText: "Tamam",
              }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                  window.location.href = window.location.href;
                } else if (result.isDenied) {
                  window.location.href = window.location.href;
                }
              });
            }else{
              
            }
          },
          error: function(xhr, status, error) {
              console.error('Hata:', xhr.responseText);
              alert('Bir hata oluştu: ' + xhr.responseText);
          }
      });
    });

    $('#create_chairmen_of_the_board').submit((e) => {
      e.preventDefault(); // Sayfanın yenilenmesini engeller
      e.stopPropagation(); // Event'in yukarı doğru yayılmasını engeller
  
      // Form elemanını doğru şekilde seçip serialize işlemi yapıyoruz
      var formData = $('#create_chairmen_of_the_board').serialize(); // Form verilerini URL-encoded hale getirir
  
      $.ajax({
          url: '/api/create_chairmen_of_the_board', // Laravel'deki API rotası
          type: 'POST',       // HTTP metodu
          data: formData,     // Gönderilecek form verileri
          success: function(response,textStatus,xhr) {
            if(xhr.status == 201){
              $('.modal').addClass('d-none');
              Swal.fire({
                icon: "success",
                title: "Başarılı",
                text: "Başarıyla yönetim kurulu başkanını eklediniz. Çalışanlarını eklemeye başlayabilirsiniz",
                showDenyButton: false,
                showCancelButton: false,
                confirmButtonText: "Tamam",
              }).then((result) => {
              });
            }else{
              
            }
          },
          error: function(xhr, status, error) {
              console.error('Hata:', xhr.responseText);
              alert('Bir hata oluştu: ' + xhr.responseText);
          }
      });
    });
  });

})(jQuery);