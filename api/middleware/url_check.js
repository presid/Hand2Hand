

module.exports = (req, res, next) => {
    try {
        for(var i = 0; i < categories.length; i++) {
            if(req.params.categoryName === categories[i]) {
                categoryName = categories[i];
                next();
            }
        }

        console.log('no category matched url');
        return res.status(401);
    } catch(err) {
        console.log(err);
        return res.status(401);
    }
}