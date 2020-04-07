const Sequelize = require('sequelize')
const db = require('../utils/database')

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

    user_id: {
        type: Sequelize.INTEGER,
        allowNull: false
    },

    categ_id: {
        type: Sequelize.INTEGER,
        allowNull: false
    },

    subcat_id: {
        type: Sequelize.INTEGER,
        allowNull: false
    },

    date: {
        type: Sequelize.DATE,
        allowNull: false
    },
})

module.exports = Product