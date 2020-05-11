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
        messages = [];
        loggedIn = false;
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

        // console.log(user);

        if (user == null) { 
            messages.push('Incorrect email or password'); 
            loggedIn = false;
            res.statusCode = 401;
            return res.render('signIn', {
                message: messages,
                loggedIn
        });
            // return res.status(401).json({message: 'Incorrect email or password'});
        }
        if (user.password.toString() === req.body.password.toString()) {
            messages.push(`welcome ${user.user_name}`);
            loggedIn = true;
            return res.render('signIn', {
                message: messages,
                loggedIn
        });
            // return res.render('signIn', {
            //     message: `welcome ${user.user_name}`
            // });
        } else {
            messages.push('Incorrect email or password'); 
            loggedIn = false;
            res.statusCode = 401;
            return res.render('signIn', {
                message: messages,
                loggedIn
        });
            // res.status(401).json({
            //     message: `Incorrect email or password`
            // });
        }

        // return res.render('signIn', {
        //         message: messages,
        //         loggedIn
        // });

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