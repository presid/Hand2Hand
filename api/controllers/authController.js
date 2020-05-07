const User = require('../models/User');

exports.signIn = async (req, res) => {
    try {
        res.render('signIn', {
            title: 'Sign in'
        }); 

    } catch (e) {
        console.log(e);
    }
}

exports.signUp = async (req, res) => {
    try {
        res.render('signUp', {
            title: 'Sign up'
        }); 

    } catch (e) {
        console.log(e);
    }
}