const User = require('../models/User');

exports.signIn = async (req, res) => {
    try {
        res.render('signIn'); 

    } catch (e) {
        console.log(e);
    }
}