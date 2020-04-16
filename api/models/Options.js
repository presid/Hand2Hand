const Sequelize = require('sequelize');
const db = require('../../utils/database');
const Category = require('../models/Category');

const Options = db.define('Options', {
    id: {
        type: Sequelize.INTEGER.ZEROFILL.UNSIGNED,
        primaryKey: true,
        autoIncrement: true, 
        allowNull: false
    },

    name: {
        type: Sequelize.STRING(20),
        allowNull: false
    }
});

Options.belongsToMany(Category, {through: 'CategoryOptions'});
Category.belongsToMany(Options, {through: 'CategoryOptions'});

module.exports = Options;