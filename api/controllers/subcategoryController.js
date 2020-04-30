const Product = require('../models/Product');
const Category = require('../models/Category');

exports.getSubcategory = async (req, res) => {
    try {

        let categoryName = null;
        let categoryNames = await Category.findAll({
            attributes: ['id', 'name']
        });

        let categoryNamesAll = categoryNames.map(item => item.get({plain: true}));

        for(var i = 0; i < categoryNamesAll.length; i++) {
            console.log('inside forloop')
            if(req.params.categoryName == categoryNamesAll[i].name) {
                categoryName = categoryNamesAll[i];
                console.log('catName: ', categoryName);
                break;
            }
        }

        console.log('categName: ', req.params.categoryName);
        console.log('categName2: ', categoryName);

        if(req.params.categoryName != categoryName.name) {res.sendStatus(404);}

        const subcatId = await Category.findOne({ 
            where: {
                name: req.params.subcategoryName,
                parent_id: categoryName.id
            },
            attributes: ['id']
        });

        const product = await Product.findAll({
            where: {
                CategoryId: subcatId.id
            }   
        });


        const data = product.map(item => item.get({plain: true}));
        console.log('data: ', data);

        res.render('subcategory', {
            title: 'Subcategories',
            data,
        });
        
    } catch (err) {
        console.log(err);
    }
}