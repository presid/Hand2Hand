const db = require('../../utils/database');
const Category = require('../models/Category');

try {
    const categoryNames = Category.findAll({
        attributes: ['name']
    });

    const categoryNames = categoryNames.map(item => item.get({plain: true}));
    console.log(categoryNames);
} catch (err){
    console.log(err);
}