Rationnel multiplier(const Rationnel& r1, const Rationnel& r2) {
    Rationnel resultat;
    resultat.numerateur = r1.numerateur * r2.numerateur;
    resultat.denominateur = r1.denominateur * r2.denominateur;
    return resultat;
}

Rationnel additionner(const Rationnel& r1, const Rationnel& r2) {
    Rationnel resultat;
    resultat.numerateur = r1.numerateur * r2.denominateur + r2.numerateur * r1.denominateur;
    resultat.denominateur = r1.denominateur * r2.denominateur;
    return resultat;
}
