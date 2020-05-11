module.exports = async (req, res, next) => {
    if(req.session.user) {
        req.userLogged = true;
        next();
    } else {
        let err = new Error('Not logged in');
        req.userLogged = false;
        next();
    }
};