const {Router} = require('express');
const router = Router();

router.get('/', (req, res, next) => {
    res.render('signIn', {
        title: 'Sign in'
    });
});

module.exports = router;