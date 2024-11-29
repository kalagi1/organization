'use strict';

const workerListToTable = (data,table) => {
  for(var i = 0 ; i < data.length; i++){
    table.find('tbody').append(`
      <tr>
        <td>${data[i].name}</td>
        <td>${data[i].is_chairmen_of_the_board ? "Yönetim Kurulu" : data[i].department.title}</td>
        <td>${data[i].is_chairmen_of_the_board ? "Başkan" : data[i].worker_title.title}</td>
      </tr>  
    `)
    console.log(data)
    if(data[i]?.children?.length > 0){
      workerListToTable(data[i].children,table);
    }
  }
}

(function($){

  $(function() {

    $.ajax({
      url: '/api/workers_with_childrens', // Laravel rotası
      type: 'GET',
      success: function(response) {
        $('#chart-container').orgchart({
          'data' : response.data[0],
          'depth': 5,
          'nodeTitle': 'name',
          'nodeContent': 'title',
          'nodeID': 'id',
        });
        var data = response.data;

        const table = $('#list-table');
        workerListToTable(data,table);
        
        
      },
      error: function(xhr, status, error) {
          console.error('Hata:', error);
          alert('Bir hata oluştu!');
      }
    });

    $('.show-chart').click(function(){
      $('#table-container').addClass('d-none')
      $('#chart-container').removeClass('d-none')
    })

    $('.show-list').click(function(){
      $('#table-container').removeClass('d-none')
      $('#chart-container').addClass('d-none')
    })

  });

})(jQuery);