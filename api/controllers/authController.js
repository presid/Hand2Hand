const User = require('../models/User');

const bcrypt = require('bcrypt');
const session = require('express-session');
const cookieParser = require('cookie-parser');


//Sign in
exports.signIn = async (req, res, next) => {
    try {
        // redirectTo = req.originalUrl;
        res.render('signIn', {
            title: 'Sign in'
        }); 

    } catch (e) {
        console.log(e);
    }
}

exports.signInUser = async (req, res, next) => {
    try {
        console.log('red: ', redirectTo);
                 
        userLogged = false;
        messages = [];
        if(!req.body.email || !req.body.password) {
            return res.render('signIn', {
                message: 'Fill all fields'
            });
        }

        const user = await User.findOne({
            where: {
                email: req.body.email
            }
        });

        if (user == null) { 
            messages.push('Incorrect email or password'); 
            req.userLogged = false;
            res.statusCode = 401;
            return res.render('signIn', {
                message: messages,
                loggedIn
        });
        }

        if (await bcrypt.compare(req.body.password, user.password)) {
            loggedIn = true;
            req.session.user = user;
            res.redirect(redirectTo);
        } else {
            messages.push('Incorrect email or password'); 
            loggedIn = false;
            res.statusCode = 401;
            req.session.destroy();
            return res.render('signIn', {
                message: messages,
                loggedIn
            });
        }

    } catch (e) {
        console.log(e);
    }
}

exports.logOut = async (req, res, next) => {
    req.session.destroy(() => {
        console.log('user logged out');        
    });
    userLogged = false;
    res.redirect('/');
}

//Sign up
exports.signUp = async (req, res, next) => {
    try {
        res.render('signUp', {
            title: 'Sign up'
        }); 

    } catch (e) {
        console.log(e);
    }
}

exports.signUpUser = async (req, res, next) => {
    try {
        if(!req.body.firstName || !req.body.lastName || !req.body.email || !req.body.password || !req.body.confirmPassword) {
            return res.render('signUp', {
                message: 'Fill all fields'
            });
        }

        if(req.body.password != req.body.confirmPassword) {
            return res.render('signUp', {
                message: 'Passwords does not match'
            });
        }

        const user = await User.findOne({
            where: {
                email: req.body.email
            }
        });
        
        if(user) {
            return res.render('signUp', {
                message: 'User with such email already exists'
            });
        } else {
            let hash = await bcrypt.hash(req.body.password, 10);
            if(!hash) {
                return res.render('signUp', {
                    message: 'Something went wrong'
                });
            }

            let newUser = await User.create({
                user_name: req.body.firstName,
                user_lastname: req.body.lastName,
                email: req.body.email,
                password: hash.toString()
            });

            req.session.user = newUser;

            res.redirect('/');
        }
    } catch (err) {
        console.log(err);
    }
}