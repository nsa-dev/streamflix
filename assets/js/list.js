$( document ).ready(function() {
    $.ajax({
        url: "controller/ajax/getlist.php",
        context: document.body
    }).done(function(json) {
        let res = JSON.parse(json);
        if(res.status != 'success') return;
        let list = res.list;
        for (var source of list) {
            $('.list').append(`
            <div class="item" onclick="SFWatch('${source.identifier}')">
                <img class="thumbnail" alt="${source.name}" src="${source.image}">
                <p class="name">${source.name}</p>
            </div>
            `)
        }
    });
});