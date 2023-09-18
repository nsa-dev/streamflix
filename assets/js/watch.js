$( document ).ready(function() {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const source = urlParams.get('v');
    
    
    $.ajax({
        url: `controller/ajax/getsource.php?identifier=${source}`,
        context: document.body
    }).done(function(json) {
        let res = JSON.parse(json);
        if(res.status != 'success') {
            alert(res.message);
            return;
        }
        let src = res.source;
        $('#player').append(`
        <iframe class="player" src="https://dooood.com/e/${src.src}" scrolling="no" frameborder="0" allowfullscreen="true"></iframe>
        `)
    });

    
});