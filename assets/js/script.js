let domain = 'https://127.0.0.1/'


const visitCheck = () => {
    if (!localStorage.getItem('viewed')) {
        introJs().start();
        localStorage.setItem('viewed', 'yes');
    }
}

$(document).ready(function () {
    visitCheck();


    $('.cancel').click(function () {
        var checkstr = confirm('are you sure you want to cancel this order?');
        if (checkstr == true) { } else {
            return false;
        }
    });
});


const checkMaster = (val) => {

    const saveToMaster = (category, product, brand, model) => {
        $.ajax({
            type: 'POST',
            url: domain + 'Hawkiweb/buyer/addMaster',
            data: {
                category: category,
                product: product,
                brand: brand,
                item: model
            },
            success: function (data) {
                swal({
                    icon: 'success',
                    title: 'Your product has been saved to the master list'
                })
            },
            error: function (data, textStatus, jqXHR) {
                swal({
                    icon: 'error',
                    title: 'Something is wrong, please try again later'
                })
            }

        });
    };

    let product = $(val).parent().parent().find('.product').val();
    let brand = $(val).parent().parent().find('.brand_name').val();
    let model = $(val).parent().parent().find('.model_no').val();
    let category = $('#Category option:selected').text().trim();
    let categoryVal = $('#Category option:selected').val()
    let masterCategory;
    let masterProduct;
    let masterBrand;
    let masterModel;
    let canSave;
    if (categoryVal != '' && product != '') {
        canSave = true;

        $('#masterTable .masterProduct td:first-child').each(function () {
            // let masterCategory = JSON.stringify({ data:$(this).text()});
            // alert(typeof(masterCategory));
            masterCategory = $(this).text().trim();
            if (category == masterCategory) {
                masterProduct = $(this).next().text().trim();
                masterBrand = $(this).next().next().text().trim();
                masterModel = $(this).next().next().next().text().trim();
                if (product == masterProduct && brand == masterBrand && model == masterModel) {

                    canSave = false;
                    // change button text
                }
            }
        });

        // After saved to master list the button will change text & disabled & onclick = null
        canSave ? (saveToMaster(categoryVal, product, brand, model), $(val).prop("disabled", true), $(val).text("Saved"), $(val).onclick = null) : swal({
            icon: 'info',
            title: 'Product exist',
            text: "You've saved this product before"
        });
    } else {
        swal({
            icon: 'error',
            title: 'Need Category and Product',
            text: 'Please select a category and input a product name first'
        })
    };

};