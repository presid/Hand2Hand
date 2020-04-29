const Category = require('../models/Category');

    async function getAllCategoryNames() {
        try {
        let categoryNames = await Category.findAll({
            attributes: ['name']
        });

        let categoryNamesAll = categoryNames.map(item => item.get({plain: true}));
        // console.log('categoryNames: ', categoryNamesAll);

        return categoryNamesAll;
        // module.exports = categoryNamesAll;
        }    
        catch (err){
            console.log(err);
        }
    }
    
const categoryNames = getAllCategoryNames().then(result => result.data);

module.exports = categoryNames