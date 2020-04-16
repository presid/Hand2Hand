const Sequelize = require('sequelize');
const db = require('../../utils/database');
// const User = require('../models/User');
// const Category = require('../models/Category');

const Product = db.define('Product', {
    id: {
        type: Sequelize.INTEGER.UNSIGNED.ZEROFILL,
        primaryKey: true,
        autoIncrement: true,
        allowNull: false
    },

    product_name: {
        type: Sequelize.STRING(30),
        allowNull: false
    },

    price: {
        type: Sequelize.FLOAT.UNSIGNED.ZEROFILL,
        allowNull: false
    },

    description: {
        type: Sequelize.STRING(255),
        allowNull: false
    },

    image: {
        type: Sequelize.STRING(70),
        allowNull: false
    },

    date: {
        type: Sequelize.DATE,
        allowNull: false
    }
});

// User.hasMany(Product, {foreignKey: 'productId'});
// Product.belongsTo(User, {foreignKey: 'productId', targetKey: 'id'});
// Product.belongsTo(Category);
// Product.belongsTo(SubCategory);
// Product.belongsTo(User);
// User.hasMany(Product);

// db.sync();


module.exports = Product;