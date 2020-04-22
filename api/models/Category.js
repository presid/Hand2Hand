const Sequelize = require('sequelize');
const db = require('../../utils/database');
const Product = require('./Product');

const Category = db.define('Category', {
    id: {
        type: Sequelize.INTEGER.UNSIGNED.ZEROFILL,
        primaryKey: true,
        autoIncrement: true,
        allowNull: false
    },

    name: {
        type: Sequelize.STRING(15),
        allowNull: false
    },

    image: {
        type: Sequelize.STRING
    },

    parent_id: {
        type: Sequelize.INTEGER.UNSIGNED.ZEROFILL,
        allowNull: false
    }
});


Category.hasMany(Product);
Product.belongsTo(Category);
// Category.hasMany(Category, {as: 'subCategory'});


// Category.hasMany(Subcategory);
// Subcategory.belongsTo(Category);
// db.sync();

module.exports = Category;