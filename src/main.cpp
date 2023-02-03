#include <list>
#include <iostream>

using namespace std;

int main(void)
{
    enum Criteres{nbDefi, nbUtilisateur, dateSortie};

    // Déclarations
    pair<string, list<string>> requeteRecherche;

    list<string> listeCriteresString;
    list<string>::iterator pointeurCritereString;
    
    list<Criteres> listeCriteres;
    list<Criteres>::iterator pointeurCriteres;

    unsigned short int nbCriteres;
    unsigned short int additionPart;
    
    unsigned short int partNombreDefi = 0;
    unsigned short int partNombreUtilisateur = 0;
    unsigned short int partDateSortie = 0;

    // Traitements
    requeteRecherche.first = "mine";
    requeteRecherche.second.push_back("nbDefi");
    requeteRecherche.second.push_back("nbUtilisateur");

    // requeteRecherche >> Extraction critères de la requête >> listeCriteres, nbCriteres
    listeCriteresString = requeteRecherche.second;
    nbCriteres = listeCriteresString.size();

    if(nbCriteres > 0)
    {
        // Conversion critères string en type Criteres
        pointeurCritereString = listeCriteresString.begin();

        for (unsigned int numCritere = 0 ; numCritere < nbCriteres ; numCritere++)
        {
            if(*pointeurCritereString == "nbDefi")
            {
                listeCriteres.push_back(nbDefi);
            }
            else if (*pointeurCritereString == "nbUtilisateur")
            {
                listeCriteres.push_back(nbUtilisateur);
            }
            else if (*pointeurCritereString == "dateSortie")
            {
                listeCriteres.push_back(dateSortie);
            }

            pointeurCritereString++;
        }

        // listeCriteres >> Calcul des nouvelles parts >> partNombreDefi, partNombreUtilisateur, partDateSortie

        // Initialisation des valeurs >> additionPart

        nbCriteres = listeCriteres.size();
        additionPart = nbCriteres;

        pointeurCriteres = listeCriteres.begin();

        for (unsigned int numCritere = 0 ; numCritere < nbCriteres ; numCritere++)
        {  
            switch (*pointeurCriteres)
            {
            case nbDefi:
                partNombreDefi = additionPart;
                break;
            case nbUtilisateur:
                partNombreUtilisateur = additionPart;
                break;
            case dateSortie:
                partDateSortie = additionPart;
                break;
            default:
                break;
            }
            additionPart--;

            pointeurCriteres++;
        }
    }

    cout << partNombreDefi << " " << partNombreUtilisateur << " " << partDateSortie;

    return 0;
}
