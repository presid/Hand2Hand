const Product = require('../models/Product');
const Category = require('../models/Category');

exports.getSubcategory = async (req, res) => {
    try {

        let categoryNameId = null;
        // let categoryNames = await Category.findAll({
        //     attributes: ['id', 'name']
        // });

        categoryNameId = await Category.findOne({
            where: { name: req.params.categoryName},
            attributes: ['id']
        });

        console.log('cateId: ', categoryNameId.id);

        // let categoryNamesAll = categoryNames.map(item => item.get({plain: true}));

        // for(var i = 0; i < categoryNames.length; i++) {
            // console.log('inside forloop')
            // if(req.params.categoryName == categoryNames[i].name) {
                // categoryName = categoryNames[i];
                // console.log('catName: ', categoryName);
                // break;
            // }
        // }

        // console.log('categName: ', req.params.categoryName);
        // console.log('categName2: ', categoryName);

        if(categoryNameId == null) {res.sendStatus(404);}
        console.log('cateId: ', categoryNameId.id);

        const subcatId = await Category.findOne({ 
            where: {
                name: req.params.subcategoryName,
                parent_id: categoryNameId.id
            },
            attributes: ['id']
        });

        if(subcatId == null) {res.sendStatus(404);}

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