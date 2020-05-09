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

exports.signInUser = async (req, res) => {
    try {

        const user = await User.findOne({
            where: {
                email: req.body.email
            }
        });

        // console.log(user);

        if (user == null) { return res.status(401).json({message: 'No user with such email'});}
        if (user.password.toString() === req.body.password.toString()) {
            return res.status(200).json({
                message: `Welcome ${user.user_name}`
            });
        } else {
            res.status(401).json({
                message: `incorrect password`
            });
        }
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