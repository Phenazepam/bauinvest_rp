document.addEventListener('DOMContentLoaded', function(){
    const CopyLevel = document.getElementById('CopyLevel');
    CopyLevel.addEventListener('click', (event) =>{
        maxX = event.target.getAttribute('maxX')
        maxY = event.target.getAttribute('maxY')
        ShowAlert(maxX, maxY)
    })
});

function ShowAlert(maxX, maxY) {
    options='';
    for (let index = 1; index <= maxY; index++) {
        options+='<option value="'+ index +'">'+ index +'</option>'
    }


    Swal.fire({
        title: 'Копирование этажей',
        html:   '<div class="row">'+
                '<div class="col">'+
                '<p>Выберите этаж для копирования</p>'+
                '<select name="source-lvl" id="source-lvl" class="form-control">'+
                '<option selected disabled hidden>№ этажа</option>'+
                options    +
                '</select>'+
                '</div>'+
                '</div>'+
                '<hr>'+
                '<div class="row">'+
                '    <div class="col">'+
                '    <p>Выберите диапазон этажей для вставки</p>'+
                '    <div class="row">'+
                '        <div class="col">'+
                '        <select name="trg-lvl-start" id="trg-lvl-start" class="form-control">'+
                '            <option selected disabled hidden>Начало вставки</option>'+
                options    +
                '        </select>'+
                '        </div>'+
                '        <div class="col">'+
                '        <select name="trg-lvl-end" id="trg-lvl-end" class="form-control">'+
                '            <option selected disabled hidden>Конец вставки</option>'+
                options+
                '        </select>'+
                '        </div>'+
                '    </div>'+
                '    </div>'+
                '</div>',
        showCancelButton: true,       
        preConfirm: async () => {
            /* let data = {
                srcLvl: document.getElementById('source-lvl').value,
                trgLvlStart: document.getElementById('trg-lvl-start').value,
                trgLvlEnd: document.getElementById('trg-lvl-end').value,
            }; */
            src = document.getElementById('source-lvl').value
            trgs = document.getElementById('trg-lvl-start').value
            trge = document.getElementById('trg-lvl-end').value
            let response = await fetch('/flats-list?action=flat.copylvls.do&flat[src]='+ src +
            '&flat[trgs]='+ trgs +'&flat[trge]='+ trge, {
                method: 'GET',
                /* headers: {
                  'Content-Type': 'application/json;charset=utf-8'
                },
                body: JSON.stringify(data) */
              });
            if (response.ok) {
                const res = await response.text();
                if(res != null){
                    Swal.fire({
                        title: "Успешно",
                        text: "Копирование успешно завершено.",
                        icon: 'success',
                        preConfirm: () => {
                            location.reload()
                        }
                    })
                }
                else{
                    Swal.fire(
                        "Ошибка",
                        "При копировании произошла ошибка.",
                        'error'
                    )
                }
            }
        }
      })
      
}