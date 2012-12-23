cd ..
rm -f apiadmin.zip
zip -r apiadmin.zip apiadmin/ -x \*/.\* \*/.git\* \*/release.sh
cd apiadmin
