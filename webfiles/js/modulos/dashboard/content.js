
elementProperty.getElement('#firstPart',element => {
    ContentController.getProducts().then(res => {
        console.log(res)
    })
});