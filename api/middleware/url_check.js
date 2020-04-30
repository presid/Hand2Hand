const Category = require('../models/Category');


module.exports = async (req, res, next) => {
    let categoryName = null;

    try {
        let categoryNames = await Category.findAll({
            attributes: ['name']
        });

        let categoryNamesAll = categoryNames.map(item => item.get({plain: true}));

        // console.log('catlist:', categoryNamesAll);
        // console.log('req.name:', req.params.categoryName);

        for(var i = 0; i < categoryNamesAll.length; i++) {
            console.log('inside forloop')
            if(req.params.categoryName == categoryNamesAll[i].name) {
                categoryName = categoryNamesAll[i];
                console.log('catName: ', categoryName);
                next();
                return;
            }
        }

        console.log('no category matched url');
        res.sendStatus(404);
    } catch(err) {
        console.log(err);
        return res.status(404);
    }
};