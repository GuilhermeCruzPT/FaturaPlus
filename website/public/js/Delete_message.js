
$('.btn-del-bills').on('click',function (e){
    e.preventDefault();
    const href = $(this).attr('href')

    Swal.fire({
        title: 'Tem a certeza que deseja continuar?',
        text: "Esta ação irá apagar dados nas linhas da fatura Não será possivel voltar atrás!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

})

$('.btn-del-ivas').on('click',function (e){
    e.preventDefault();
    const href = $(this).attr('href')

    Swal.fire({
        title: 'Tem a certeza que deseja continuar?',
        text: "Esta ação irá apagar dados nas linhas da fatura e nos produtos. Não será possivel voltar atrás!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

})

$('.btn-del-lines').on('click',function (e){
    e.preventDefault();
    const href = $(this).attr('href')

    Swal.fire({
        title: 'Tem a certeza que deseja continuar?',
        text: "Não será possivel voltar atrás!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
})

$('.btn-del-products').on('click',function (e){
    e.preventDefault();
    const href = $(this).attr('href')

    Swal.fire({
        title: 'Tem a certeza que deseja continuar?',
        text: "Esta ação irá apagar dados nos produtos. Não será possivel voltar atrás!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
        }

    })

})

$('.btn-del-users').on('click',function (e){
    e.preventDefault();
    const href = $(this).attr('href')

    Swal.fire({
        title: 'Tem a certeza que deseja continuar?',
        text: "Esta ação irá apagar dados nas linhas da fatura e na propria fatura. Não será possivel voltar atrás!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
})
