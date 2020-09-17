// #texttest

ClassicEditor.create(document.querySelector('#texttest'), {
    // toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'image'],
    toolbar: [
        'heading',
        '|',
        'bold',
        'italic',
        'blockQuote',
        '|',
        'link',
        'imageUpload',
        'mediaEmbed',
        '|',
        'numberedList',
        'bulletedList',
        '|',
        'insertTable',
        'tableColumn',
        'tableRow',
        'mergeTableCells',
        '|',
        'undo',
        'redo',
        
        // 'imageStyle:full',
        // 'imageStyle:side',
        
        
    ],
}).catch(error => {
    console.log(error);
});


// 'undo'
// 'redo'
// 'bold'
// 'italic'
// 'blockQuote'
// 'ckfinder'
// 'imageTextAlternative'
// 'imageUpload'
// 'heading'
// 'imageStyle:full'
// 'imageStyle:side'
// 'link'
// 'numberedList'
// 'bulletedList'
// 'mediaEmbed'
// 'insertTable'
// 'tableColumn'
// 'tableRow'
// 'mergeTableCells'