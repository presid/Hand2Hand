const {Router} = require('express');
const router = Router;
const authController = require('../controllers/authController');

router.get('/signin', authController.signIn);
// router.get('/signin', (req, res) => {res.render('signIn')});

router.get('/signout', authController.signOut);
router.get('/signup', authController.signUp);

module.exports = router;