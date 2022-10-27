let table = $('#page_table_items').DataTable({
    serverSide: true,
    ajax: `${root}/items/get-list`,
    bSort: true,
    order: [],
    destroy: true,
    columns: [
        { data: "order" },
        { data: "image"},
        { data: "content_1" },        
        { data: 'actions', name: 'actions', orderable: false, searchable: false }
    ],
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
    }, 
});

let tableCertificaciones = $('#page_table_certifications').DataTable({
    serverSide: true,
    ajax: `${root}/certifications/get-list`,
    bSort: true,
    order: [],
    destroy: true,
    columns: [
        { data: "order" },
        { data: "image"},
        { data: "content_1" },     
        { data: "content_2" },     
        { data: 'actions', name: 'actions', orderable: false, searchable: false }
    ],
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
    }, 
});

let tableMaquinaria = $('#page_table_machinery').DataTable({
    serverSide: true,
    ajax: `${root}/machinery/get-list`,
    bSort: true,
    order: [],
    destroy: true,
    columns: [
        { data: "order" },
        { data: "image"},
        { data: "content_1" },     
        { data: "content_2" },     
        { data: 'actions', name: 'actions', orderable: false, searchable: false }
    ],
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json",
    }, 
});

function dataSliderContent(content)
{
    let form = document.getElementById('form-update-slider')
    form.querySelector('input[name="id"]').value = content.id
    form.querySelector('input[name="order"]').value = content.order
    form.querySelector('input[name="content_1"]').value = content.content_1
}

async function findContent2(id, section)
{   
    let fileDocumento = document.getElementById('documento')
    if (section == 1){
        fileDocumento.style.display = "block"
    }else{
        fileDocumento.style.display = "none"
    }
        
    
        

    // get content 
    let url = document.querySelector('meta[name="content_find"]').getAttribute('content')
    if(url){
        if(id){
            try {
                let result = await axios.get(`${url}/${id}`)
                let content = result.data.content 
                dataMultiContent(content)
            } catch (error) {
                console.log(new Error(error));
            }
        }
    }
}

function dataMultiContent(content)
{
    let form = document.getElementById('form-update-multi')
    form.querySelector('input[name="id"]').value = content.id
    form.querySelector('input[name="order"]').value = content.order
    form.querySelector('input[name="content_1"]').value = content.content_1
    CKEDITOR.instances['content_2'].setData(content.content_2) 
}

